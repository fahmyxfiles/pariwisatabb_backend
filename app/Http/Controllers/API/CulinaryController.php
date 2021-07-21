<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Culinary;
use App\Models\CulinaryCategory;
use App\Models\Regency;
use Validator;
use App\Http\Resources\Culinary as CulinaryResource;
use App\Http\Resources\CulinaryCategory as CulinaryCategoryResource;
use App\Http\Resources\Regency as RegencyResource;
use Intervention\Image\Facades\Image;

class CulinaryController extends BaseController
{
    const ITEM_PER_PAGE = 6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchParams = $request->all();
        $culinaryQuery = Culinary::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');
        $regency_id = Arr::get($searchParams, 'regency_id', '');
        $paginate = Arr::get($searchParams, 'paginate', '1');
        $scope = Arr::get($searchParams, 'scope', 'regency,images');

        if (!empty($keyword)) {
            $culinaryQuery->where(function ($query) use ($keyword){
                $query->where('name', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('address', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('description', 'LIKE', '%' . $keyword . '%');
            });
        }

        if(!empty($regency_id)){
            $culinaryQuery->where('regency_id', '=', $regency_id);
        }
        
        if (!empty($paginate)) {
            return CulinaryResource::collection($culinaryQuery->with(explode(",", $scope))->paginate($limit));
        }
        else {
            return CulinaryResource::collection($culinaryQuery->with(explode(",", $scope))->get());
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'regency_id' => 'required|exists:regencies,id',
            'name' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $culinary = Culinary::create($input);
        $culinary->load(['images']);
        return $this->sendResponse(new CulinaryResource($culinary));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Culinary $culinary)
    {
        $culinary->load(['images']);
        return $this->sendResponse(new CulinaryResource($culinary));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Culinary $culinary)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'regency_id' => 'required|exists:regencies,id',
            'name' => 'required',
            'description' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $culinary->update($input);
        $culinary->load(['images']);
        return $this->sendResponse(new CulinaryResource($culinary));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Culinary $culinary)
    {
        try {
            $culinary->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function getAvailableRegencies(Request $request){
        $regencies = Regency::all();
        return RegencyResource::collection($regencies);
    }

    public function getAvailableCategories(Request $request){
        $culinaryCategory = CulinaryCategory::all();
        return CulinaryCategoryResource::collection($culinaryCategory);
    }

    public function syncPlaces(Request $request, Culinary $culinary){
        $input = $request->all();

        $validator = Validator::make($input, [
            'places' => 'required|array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $culinary->places()->sync($input['places']);
        } catch (\Exception $ex) {
            return $this->sendError('Sync Error.', $ex->getMessage(), 403);    
        }
        $culinary->load(['images']);
        return $this->sendResponse(new CulinaryCategoryResource($culinary));
    }
}