<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\TouristAttraction;
use App\Models\TouristAttractionCategory;
use App\Models\Regency;
use Validator;
use App\Http\Resources\TouristAttraction as TouristAttractionResource;
use App\Http\Resources\TouristAttractionCategory as TouristAttractionCategoryResource;
use App\Http\Resources\Regency as RegencyResource;
use Intervention\Image\Facades\Image;

class TouristAttractionController extends BaseController
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
        $touristAttractionQuery = TouristAttraction::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $touristAttractionQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $touristAttractionQuery->orWhere('address', 'LIKE', '%' . $keyword . '%');
            $touristAttractionQuery->orWhere('description', 'LIKE', '%' . $keyword . '%');
        }

        return TouristAttractionResource::collection($touristAttractionQuery->paginate($limit));
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
        $touristAttraction = TouristAttraction::create($input);
        $touristAttraction->load(['images', 'pricings', 'facilities']);
        return $this->sendResponse(new TouristAttractionResource($touristAttraction));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TouristAttraction $touristAttraction)
    {
        $touristAttraction->load(['images', 'pricings', 'facilities']);
        return $this->sendResponse(new TouristAttractionResource($touristAttraction));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TouristAttraction $touristAttraction)
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
        $touristAttraction->update($input);
        $touristAttraction->load(['images', 'pricings', 'facilities']);
        return $this->sendResponse(new TouristAttractionResource($touristAttraction));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TouristAttraction $touristAttraction)
    {
        try {
            $touristAttraction->delete();
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
        $touristAttractionCategory = TouristAttractionCategory::all();
        return TouristAttractionCategoryResource::collection($touristAttractionCategory);
    }

    public function syncFacilities(Request $request, TouristAttraction $touristAttraction){
        $input = $request->all();

        $validator = Validator::make($input, [
            'facilities' => 'required|array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $touristAttraction->facilities()->sync($input['facilities']);
        } catch (\Exception $ex) {
            return $this->sendError('Sync Error.', $ex->getMessage(), 403);    
        }
        $touristAttraction->load(['images', 'pricings', 'facilities']);
        return $this->sendResponse(new TouristAttractionResource($touristAttraction));
    }
}