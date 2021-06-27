<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\HotelRoomPricing;
use Validator;
use App\Http\Resources\HotelRoomPricing as HotelRoomPricingResource;

class HotelRoomPricingController extends BaseController
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
        $hotelRoomPricingQuery = HotelRoomPricing::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $hotelRoomPricingQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $hotelRoomPricingQuery->orWhere('date', 'LIKE', '%' . $keyword . '%');
        }

        return HotelRoomPricingResource::collection($hotelRoomPricingQuery->paginate($limit));
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
            'hotel_room_id' => 'required|exists:hotel_rooms,id',
            'type' => 'required',
            'date' => 'date',
            'price' => 'required|numeric|min:1000',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hotelRoomPricing = HotelRoomPricing::create($input);
        return $this->sendResponse(new HotelRoomPricingResource($hotelRoomPricing));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRoomPricing $hotelRoomPricing)
    {
        return $this->sendResponse(new HotelRoomPricingResource($hotelRoomPricing));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelRoomPricing $hotelRoomPricing)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'hotel_room_id' => 'required|exists:hotel_rooms,id',
            'type' => 'required',
            'date' => 'date',
            'price' => 'required|numeric|min:1000',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hotelRoomPricing->update($input);
        return $this->sendResponse(new HotelRoomPricingResource($hotelRoomPricing));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelRoomPricing $hotelRoomPricing)
    {
        try {
            $hotelRoomPricing->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}