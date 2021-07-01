<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\HotelImage;
use Validator;
use App\Http\Resources\HotelImage as HotelImageResource;

use Intervention\Image\Facades\Image;

class HotelImageController extends BaseController
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
        $hotelImageQuery = HotelImage::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $hotelImageQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        return HotelImageResource::collection($hotelImageQuery->paginate($limit));
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
            'hotel_room_id' => 'exists:hotels,id',
            'name' => 'required',
            'type' => 'required',
            'file' => 'required|image'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $img = Image::make($input['file']);
        if($img == null){
            return $this->sendError('Image Error.', 'Invalid Image uploaded');  
        }
        // add callback functionality to retain maximal original image size
        $img->fit(1280, 720, function ($constraint) {
            $constraint->upsize();
        });
        $ext = explode("/", $img->mime())[1];
       
        $name = time() . "." . $ext;
        Storage::disk('images')->put("hotel/" . $name, $img->stream('jpg', 80));
        $input['image_filename'] = "images/hotel/" . $name;

        unset($input['file']);

        $hotelImage = HotelImage::create($input);
        return $this->sendResponse(new HotelImageResource($hotelImage));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HotelImage $hotelImage)
    {
        return $this->sendResponse(new HotelImageResource($hotelImage));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelImage $hotelImage)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'hotel_id' => 'required|exists:hotels,id',
            'hotel_room_id' => 'exists:hotels,id',
            'name' => 'required',
            'type' => 'required',
            'file' => 'image'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if(!empty($input['file'])){
            Storage::disk('images')->delete('hotel/' . basename($hotelImage->image_filename));
            $img = Image::make(file_get_contents($input['file']));
            if($img == null){
                return $this->sendError('Image Error.', 'Invalid Image uploaded');  
            }
            // add callback functionality to retain maximal original image size
            $img->fit(1280, 720, function ($constraint) {
                $constraint->upsize();
            });
            $ext = explode("/", $img->mime())[1];
        
            $name = time() . "." . $ext;
            Storage::disk('images')->put("hotel/" . $name, $img->stream('jpg', 80));
            $input['image_filename'] = "images/hotel/" . $name;
        }
        unset($input['file']);

        $hotelImage->update($input);
        return $this->sendResponse(new HotelImageResource($hotelImage));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelImage $hotelImage)
    {
        try {
            Storage::disk('images')->delete('hotel/' . basename($hotelImage->image_filename));
            $hotelImage->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}