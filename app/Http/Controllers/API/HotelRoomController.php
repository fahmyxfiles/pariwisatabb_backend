<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\HotelRoom;
use Validator;
use App\Http\Resources\HotelRoom as HotelRoomResource;

class HotelRoomController extends BaseController
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
        $hotelRoomQuery = HotelRoom::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $hotelRoomQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $hotelRoomQuery->orWhere('description', 'LIKE', '%' . $keyword . '%');
        }

        return HotelRoomResource::collection($hotelRoomQuery->paginate($limit));
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
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required',
            'description' => 'required',
            'num_of_guest' => 'required|numeric|min:1',
            'room_size' => 'required|numeric|min:1',
            'bed_size' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hotelRoom = HotelRoom::create($input);
        return $this->sendResponse(new HotelRoomResource($hotelRoom));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRoom $hotelRoom)
    {
        return $this->sendResponse(new HotelRoomResource($hotelRoom));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelRoom $hotelRoom)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'hotel_id' => 'required|exists:hotels,id',
            'name' => 'required',
            'description' => 'required',
            'num_of_guest' => 'required|numeric|min:1',
            'room_size' => 'required|numeric|min:1',
            'bed_size' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hotelRoom->update($input);
        return $this->sendResponse(new HotelRoomResource($hotelRoom));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelRoom $hotelRoom)
    {
        try {
            $hotelRoom->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function syncFacilities(Request $request, HotelRoom $hotelRoom){
        $input = $request->all();

        $validator = Validator::make($input, [
            'facilities' => 'required|array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $hotelRoom->facilities()->sync($input['facilities']);
        } catch (\Exception $ex) {
            return $this->sendError('Sync Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse(new HotelRoomResource($hotelRoom));
    }
}