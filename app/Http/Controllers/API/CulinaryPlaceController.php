<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\CulinaryPlace;
use App\Models\CulinaryPlaceCategory;
use App\Models\Regency;
use Validator;
use App\Http\Resources\CulinaryPlace as CulinaryPlaceResource;
use App\Http\Resources\CulinaryPlaceCategory as CulinaryPlaceCategoryResource;
use App\Http\Resources\Regency as RegencyResource;
use Intervention\Image\Facades\Image;

class CulinaryPlaceController extends BaseController
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
        $culinaryPlaceQuery = CulinaryPlace::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');
        $regency_id = Arr::get($searchParams, 'regency_id', '');
        $paginate = Arr::get($searchParams, 'paginate', '1');
        $scope = Arr::get($searchParams, 'scope', 'regency,images');

        if (!empty($keyword)) {
            $culinaryPlaceQuery->where(function ($query) use ($keyword){
                $query->where('name', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('address', 'LIKE', '%' . $keyword . '%');
                $query->orWhere('description', 'LIKE', '%' . $keyword . '%');
            });
        }

        if(!empty($regency_id)){
            $culinaryPlaceQuery->where('regency_id', '=', $regency_id);
        }
        
        if (!empty($paginate)) {
            return CulinaryPlaceResource::collection($culinaryPlaceQuery->with(explode(",", $scope))->paginate($limit));
        }
        else {
            return CulinaryPlaceResource::collection($culinaryPlaceQuery->with(explode(",", $scope))->get());
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
            'address' => 'required',
            'postal_code' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $culinaryPlace = CulinaryPlace::create($input);
        $culinaryPlace->load(['images']);
        return $this->sendResponse(new CulinaryPlaceResource($culinaryPlace));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CulinaryPlace $culinaryPlace)
    {
        $culinaryPlace->load(['images']);
        return $this->sendResponse(new CulinaryPlaceResource($culinaryPlace));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CulinaryPlace $culinaryPlace)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'regency_id' => 'required|exists:regencies,id',
            'name' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'description' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $culinaryPlace->update($input);
        $culinaryPlace->load(['images']);
        return $this->sendResponse(new CulinaryPlaceResource($culinaryPlace));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CulinaryPlace $culinaryPlace)
    {
        try {
            $culinaryPlace->delete();
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
        $culinaryPlaceCategory = CulinaryPlaceCategory::all();
        return CulinaryPlaceCategoryResource::collection($culinaryPlaceCategory);
    }
}