<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\GuestHouseRoom;
use Validator;
use App\Http\Resources\GuestHouseRoom as GuestHouseRoomResource;

class GuestHouseRoomController extends BaseController
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
        $guestHouseRoomQuery = GuestHouseRoom::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $guestHouseRoomQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $guestHouseRoomQuery->orWhere('description', 'LIKE', '%' . $keyword . '%');
        }

        return GuestHouseRoomResource::collection($guestHouseRoomQuery->paginate($limit));
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
            'guest_house_id' => 'required|exists:guest_houses,id',
            'name' => 'required',
            'description' => 'required',
            'num_of_guest' => 'required|numeric|min:1',
            'room_size' => 'required|numeric|min:1',
            'bed_size' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $guestHouseRoom = GuestHouseRoom::create($input);
        return $this->sendResponse(new GuestHouseRoomResource($guestHouseRoom));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GuestHouseRoom $guestHouseRoom)
    {
        return $this->sendResponse(new GuestHouseRoomResource($guestHouseRoom));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestHouseRoom $guestHouseRoom)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'guest_house_id' => 'required|exists:guest_houses,id',
            'name' => 'required',
            'description' => 'required',
            'num_of_guest' => 'required|numeric|min:1',
            'room_size' => 'required|numeric|min:1',
            'bed_size' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $guestHouseRoom->update($input);
        return $this->sendResponse(new GuestHouseRoomResource($guestHouseRoom));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestHouseRoom $guestHouseRoom)
    {
        try {
            $guestHouseRoom->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function syncFacilities(Request $request, GuestHouseRoom $guestHouseRoom){
        $input = $request->all();

        $validator = Validator::make($input, [
            'facilities' => 'required|array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $guestHouseRoom->facilities()->sync($input['facilities']);
        } catch (\Exception $ex) {
            return $this->sendError('Sync Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse(new GuestHouseRoomResource($guestHouseRoom));
    }
}