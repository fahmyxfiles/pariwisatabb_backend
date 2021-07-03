<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\GuestHouseRoomPricing;
use Validator;
use App\Http\Resources\GuestHouseRoomPricing as GuestHouseRoomPricingResource;

class GuestHouseRoomPricingController extends BaseController
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
        $guestHouseRoomPricingQuery = GuestHouseRoomPricing::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $guestHouseRoomPricingQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $guestHouseRoomPricingQuery->orWhere('date', 'LIKE', '%' . $keyword . '%');
        }

        return GuestHouseRoomPricingResource::collection($guestHouseRoomPricingQuery->paginate($limit));
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
            'guest_house_room_id' => 'required|exists:guest_house_rooms,id',
            'type' => 'required',
            'date' => 'date',
            'price' => 'required|numeric|min:1000',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $guestHouseRoomPricing = GuestHouseRoomPricing::create($input);
        return $this->sendResponse(new GuestHouseRoomPricingResource($guestHouseRoomPricing));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GuestHouseRoomPricing $guestHouseRoomPricing)
    {
        return $this->sendResponse(new GuestHouseRoomPricingResource($guestHouseRoomPricing));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestHouseRoomPricing $guestHouseRoomPricing)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'guest_house_room_id' => 'required|exists:guest_house_rooms,id',
            'type' => 'required',
            'date' => 'date',
            'price' => 'required|numeric|min:1000',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $guestHouseRoomPricing->update($input);
        return $this->sendResponse(new GuestHouseRoomPricingResource($guestHouseRoomPricing));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestHouseRoomPricing $guestHouseRoomPricing)
    {
        try {
            $guestHouseRoomPricing->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}