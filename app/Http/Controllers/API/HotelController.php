<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Hotel;
use Validator;
use App\Http\Resources\Hotel as HotelResource;
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
            'description' => 'required',
            'image' => 'required|base64image|base64mimes:png,jpg,jpeg|base64max:2048',
            'timezone_offset' => 'required|numeric',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $img = Image::make(file_get_contents($input['image']));
        if($img == null){
            return $this->sendError('Image Error.', 'Invalid Image uploaded');  
        }
        // add callback functionality to retain maximal original image size
        $img->fit(640, 360, function ($constraint) {
            $constraint->upsize();
        });
        $ext = explode("/", $img->mime())[1];
       
        $name = time() . "." . $ext;
        Storage::disk('images')->put("regency/" . $name, $img->stream('jpg', 80));
        $input['image_filename'] = "images/regency/" . $name;

        unset($input['image']);

        $regency = Regency::create($input);
   
        return $this->sendResponse(new RegencyResource($regency));
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
    public function update(Request $request, Regency $regency)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required',
            'description' => 'required',
            'image' => 'base64image|base64mimes:png,jpg,jpeg|base64max:2048',
            'timezone_offset' => 'required|numeric',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        if(!empty($input['image'])){
            Storage::disk('images')->delete('regency/' . basename($regency->image_filename));
            $img = Image::make(file_get_contents($input['image']));
            if($img == null){
                return $this->sendError('Image Error.', 'Invalid Image uploaded');  
            }
            // add callback functionality to retain maximal original image size
            $img->fit(640, 360, function ($constraint) {
                $constraint->upsize();
            });
            $ext = explode("/", $img->mime())[1];
        
            $name = time() . "." . $ext;
            Storage::disk('images')->put("regency/" . $name, $img->stream('jpg', 80));
            $input['image_filename'] = "images/regency/" . $name;
        }
        unset($input['image']);

        $regency->update($input);

        return $this->sendResponse(new RegencyResource($regency));
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
            Storage::disk('images')->delete('regency/' . basename($regency->image_filename));
            $hotel->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}