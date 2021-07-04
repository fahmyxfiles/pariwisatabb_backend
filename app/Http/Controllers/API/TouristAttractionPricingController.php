<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\TouristAttractionPricing;
use App\Models\Regency;
use Validator;
use App\Http\Resources\TouristAttractionPricing as TouristAttractionPricingResource;
use App\Http\Resources\Regency as RegencyResource;
use Intervention\Image\Facades\Image;

class TouristAttractionPricingController extends BaseController
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
        $touristAttractionPricingQuery = TouristAttractionPricing::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $touristAttractionPricingQuery->where('note', 'LIKE', '%' . $keyword . '%');
        }

        return TouristAttractionPricingResource::collection($touristAttractionPricingQuery->paginate($limit));
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
            'tourist_attraction_id' => 'required|exists:tourist_attractions,id',
            'type' => 'required',
            'category' => 'required',
            'category_type' => 'required',
            'price' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $touristAttractionPricing = TouristAttractionPricing::create($input);
        return $this->sendResponse(new TouristAttractionPricingResource($touristAttractionPricing));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TouristAttractionPricing $touristAttractionPricing)
    {
        return $this->sendResponse(new TouristAttractionPricingResource($touristAttractionPricing));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TouristAttractionPricing $touristAttractionPricing)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'tourist_attraction_id' => 'required|exists:tourist_attractions,id',
            'type' => 'required',
            'category' => 'required',
            'category_type' => 'required',
            'price' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $touristAttractionPricing->update($input);
        return $this->sendResponse(new TouristAttractionPricingResource($touristAttractionPricing));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TouristAttractionPricing $touristAttractionPricing)
    {
        try {
            $touristAttractionPricing->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}