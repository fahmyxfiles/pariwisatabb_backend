<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Facility;
use App\Models\FacilityCategory;
use Validator;
use App\Http\Resources\Facility as FacilityResource;
use App\Http\Resources\FacilityCategory as FacilityCategoryResource;

class HotelController extends BaseController
{
    const ITEM_PER_PAGE = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchParams = $request->all();
        $facilityQuery = Facility::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $facilityQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        return FacilityResource::collection($facilityQuery->paginate($limit));
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
            'category_id' => 'required|exists:facility_categories,id',
            'name' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $facility = Facility::create($input);
   
        return $this->sendResponse(new FacilityResource($facility));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        $facility->load('category');
        return $this->sendResponse(new FacilityResource($facility));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'category_id' => 'required|exists:facility_categories,id',
            'name' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $facility->update($input);

        return $this->sendResponse(new FacilityResource($facility));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        try {
            $facility->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function getAvailableCategories($type){
        if (!is_null($type)) {
            $facilityCategory = FacilityCategory::where('type' , $type)->get();
        }
        else {
            $facilityCategory = FacilityCategory::all();
        }
        return FacilityCategoryResource::collection($facilityCategory);
    }
}