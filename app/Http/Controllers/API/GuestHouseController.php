<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\GuestHouse;
use App\Models\Regency;
use Validator;
use App\Http\Resources\GuestHouse as GuestHouseResource;
use App\Http\Resources\Regency as RegencyResource;
use Intervention\Image\Facades\Image;

class GuestHouseController extends BaseController
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
        $guestHouseQuery = GuestHouse::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');
        $regency_id = Arr::get($searchParams, 'regency_id', '');
        $paginate = Arr::get($searchParams, 'paginate', '1');
        $scope = Arr::get($searchParams, 'scope', 'regency,images');

        if (!empty($keyword)) {
            if (!empty($keyword)) {
                $guestHouseQuery->where(function ($query) use ($keyword){
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                    $query->orWhere('address', 'LIKE', '%' . $keyword . '%');
                    $query->orWhere('description', 'LIKE', '%' . $keyword . '%');
                });
            }
        }

        if(!empty($regency_id)){
            $guestHouseQuery->where('regency_id', '=', $regency_id);
        }

        if (!empty($paginate)) {
            return HotelResource::collection($guestHouseQuery->with(explode(",", $scope))->paginate($limit));
        }
        else {
            return HotelResource::collection($guestHouseQuery->with(explode(",", $scope))->get());
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

        $guestHouse = GuestHouse::create($input);
        $guestHouse->load(['images', 'rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new GuestHouseResource($guestHouse));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GuestHouse $guestHouse)
    {
        $guestHouse->load(['images', 'rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new GuestHouseResource($guestHouse));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestHouse $guestHouse)
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

        $guestHouse->update($input);
        $guestHouse->load(['images', 'rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new GuestHouseResource($guestHouse));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestHouse $guestHouse)
    {
        try {
            $guestHouse->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function getAvailableRegencies(Request $request){
        $regencies = Regency::all();
        return RegencyResource::collection($regencies);
    }

    public function syncFacilities(Request $request, GuestHouse $guestHouse){
        $input = $request->all();

        $validator = Validator::make($input, [
            'facilities' => 'required|array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            $guestHouse->facilities()->sync($input['facilities']);
        } catch (\Exception $ex) {
            return $this->sendError('Sync Error.', $ex->getMessage(), 403);    
        }
        $guestHouse->load(['images', 'rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new GuestHouseResource($guestHouse));
    }
}