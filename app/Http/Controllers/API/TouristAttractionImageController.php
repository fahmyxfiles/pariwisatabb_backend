<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\TouristAttractionImage;
use Validator;
use App\Http\Resources\TouristAttractionImage as TouristAttractionImageResource;

use Intervention\Image\Facades\Image;

class TouristAttractionImageController extends BaseController
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
        $touristAttractionImageQuery = TouristAttractionImage::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $touristAttractionImageQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        return TouristAttractionImageResource::collection($touristAttractionImageQuery->paginate($limit));
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

        $width = 1000;
        $height = 1000;
        $imageValidationParams = 'required|image|mimes:png,jpg,jpeg|max:2048';
        if($input['type'] == 'main'){
            $width = 960;
            $height = 540;
        }
        if($input['type'] == 'banner'){
            $width = 750;
            $height = 200;
        }
        if($input['type'] == 'common'){
            $width = 800;
            $height = 600;
        }

        $validator = Validator::make($input, [
            'guest_house_id' => 'required|exists:guest_houses,id',
            'guest_house_room_id' => 'nullable|exists:guest_house_rooms,id',
            'name' => 'required',
            'type' => 'required',
            'file' => $imageValidationParams
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $img = Image::make(file_get_contents($input['file']));
        if($img == null){
            return $this->sendError('Image Error.', 'Invalid Image uploaded');  
        }
        if($img->width() < $width || $img->height() < $height){
            return $this->sendError('Invalid size.', 'Minimum allowed image size is ' . $width . 'x' . $height);  
        }
        // add callback functionality to retain maximal original image size
        $img->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        });
        $ext = explode("/", $img->mime())[1];
       
        $name = time() . "." . $ext;
        Storage::disk('images')->put("guest_house/" . $name, $img->stream('jpg', 80));
        $input['image_filename'] = "images/guest_house/" . $name;

        unset($input['file']);

        $touristAttractionImage = TouristAttractionImage::create($input);
        return $this->sendResponse(new TouristAttractionImageResource($touristAttractionImage));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TouristAttractionImage $touristAttractionImage)
    {
        return $this->sendResponse(new TouristAttractionImageResource($touristAttractionImage));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TouristAttractionImage $touristAttractionImage)
    {
        $input = $request->all();

        $width = 1000;
        $height = 1000;
        $imageValidationParams = 'image|mimes:png,jpg,jpeg|max:2048';
        if($input['type'] == 'main'){
            $width = 960;
            $height = 540;
        }
        if($input['type'] == 'banner'){
            $width = 750;
            $height = 200;
        }
        if($input['type'] == 'common'){
            $width = 800;
            $height = 600;
        }

        $validator = Validator::make($input, [
            'guest_house_id' => 'required|exists:guest_houses,id',
            'guest_house_room_id' => 'nullable|exists:guest_house_rooms,id',
            'name' => 'required',
            'type' => 'required',
            'file' => $imageValidationParams
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if(!empty($input['file'])){
            $img = Image::make(file_get_contents($input['file']));
            if($img == null){
                return $this->sendError('Image Error.', 'Invalid Image uploaded');  
            }
            if($img->width() < $width || $img->height() < $height){
                return $this->sendError('Invalid size.', 'Minimum allowed image size is ' . $width . 'x' . $height);  
            }
            // add callback functionality to retain maximal original image size
            $img->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            });
            $ext = explode("/", $img->mime())[1];

            Storage::disk('images')->delete('guest_house/' . basename($touristAttractionImage->image_filename));
            
            $name = time() . "." . $ext;
            Storage::disk('images')->put("guest_house/" . $name, $img->stream('jpg', 80));
            $input['image_filename'] = "images/guest_house/" . $name;
            unset($input['file']);
        }

        $touristAttractionImage->update($input);
        return $this->sendResponse(new TouristAttractionImageResource($touristAttractionImage->fresh()));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TouristAttractionImage $touristAttractionImage)
    {
        try {
            Storage::disk('images')->delete('guest_house/' . basename($touristAttractionImage->image_filename));
            $touristAttractionImage->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}