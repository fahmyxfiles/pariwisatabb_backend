<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Hotel;
use App\Models\Regency;
use Validator;
use App\Http\Resources\Hotel as HotelResource;
use App\Http\Resources\Regency as RegencyResource;
use Intervention\Image\Facades\Image;

class HotelController extends BaseController
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
        $hotelQuery = Hotel::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $hotelQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $hotelQuery->orWhere('address', 'LIKE', '%' . $keyword . '%');
            $hotelQuery->orWhere('description', 'LIKE', '%' . $keyword . '%');
        }

        return HotelResource::collection($hotelQuery->paginate($limit));
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
            'map_coordinate' => 'required',
            'map_center' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hotel = Hotel::create($input);
        $hotel->load(['rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new HotelResource($hotel));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $hotel->load(['rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new HotelResource($hotel));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'regency_id' => 'required|exists:regencies,id',
            'name' => 'required',
            'address' => 'required',
            'map_coordinate' => 'required',
            'map_center' => 'required',
            'description' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $hotel->update($input);
        $hotel->load(['rooms', 'rooms.facilities', 'rooms.images', 'rooms.pricings', 'facilities']);
        return $this->sendResponse(new HotelResource($hotel));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function getAvailableRegencies(Request $request){
        $regencies = Regency::all();
        return RegencyResource::collection($regencies);
    }
}