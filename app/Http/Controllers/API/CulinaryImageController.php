<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\CulinaryImage;
use Validator;
use App\Http\Resources\CulinaryImage as CulinaryImageResource;

use Intervention\Image\Facades\Image;

class CulinaryImageController extends BaseController
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
        $culinaryImageQuery = CulinaryImage::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $culinaryImageQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        return CulinaryImageResource::collection($culinaryImageQuery->paginate($limit));
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
            $width = 640;
            $height = 360;
        }
        if($input['type'] == 'banner'){
            $width = 900;
            $height = 240;
        }
        if($input['type'] == 'common'){
            $width = 800;
            $height = 600;
        }

        $validator = Validator::make($input, [
            'culinary_id' => 'required|exists:culinaries,id',
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
        $format = "jpg";
       
        $name = time() . "." . $format;
        Storage::disk('images')->put("culinary/" . $name, $img->stream($format, 100));
        $input['image_filename'] = "images/culinary/" . $name;

        unset($input['file']);

        $culinaryImage = CulinaryImage::create($input);
        return $this->sendResponse(new CulinaryImageResource($culinaryImage));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CulinaryImage $culinaryImage)
    {
        return $this->sendResponse(new CulinaryImageResource($culinaryImage));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CulinaryImage $culinaryImage)
    {
        $input = $request->all();

        $width = 1000;
        $height = 1000;
        $imageValidationParams = 'image|mimes:png,jpg,jpeg|max:2048';
        if($input['type'] == 'main'){
            $width = 640;
            $height = 360;
        }
        if($input['type'] == 'banner'){
            $width = 900;
            $height = 240;
        }
        if($input['type'] == 'common'){
            $width = 800;
            $height = 600;
        }

        $validator = Validator::make($input, [
            'culinary_id' => 'required|exists:culinaries,id',
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
            $format = "jpg";

            Storage::disk('images')->delete('culinary/' . basename($culinaryImage->image_filename));
            
            $name = time() . "." . $format;
            Storage::disk('images')->put("culinary/" . $name, $img->stream($format, 100));
            $input['image_filename'] = "images/culinary/" . $name;
            unset($input['file']);
        }

        $culinaryImage->update($input);
        return $this->sendResponse(new CulinaryImageResource($culinaryImage->fresh()));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CulinaryImage $culinaryImage)
    {
        try {
            Storage::disk('images')->delete('culinary/' . basename($culinaryImage->image_filename));
            $culinaryImage->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}