<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\TouristAttractionCategory;
use Validator;
use App\Http\Resources\TouristAttractionCategory as TouristAttractionCategoryResource;
use Intervention\Image\Facades\Image;

class TouristAttractionCategoryController extends BaseController
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
        $touristAttractionCategoryQuery = TouristAttractionCategory::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');
        $paginate = Arr::get($searchParams, 'paginate', '1');

        if (!empty($keyword)) {
            $touristAttractionCategoryQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        if (!empty($paginate)) {
            return TouristAttractionCategoryResource::collection($touristAttractionCategoryQuery->paginate($limit));
        }
        else {
            return TouristAttractionCategoryResource::collection($touristAttractionCategoryQuery->get());
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
            'name' => 'required',
            'image' => 'required|base64image|base64mimes:png,jpg,jpeg|base64max:2048',
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
        Storage::disk('images')->put("tourist_attraction/" . $name, $img->stream('jpg', 80));
        $input['image_filename'] = "images/tourist_attraction/" . $name;

        unset($input['image']);

        $touristAttractionCategory = TouristAttractionCategory::create($input);
        return $this->sendResponse(new TouristAttractionCategoryResource($touristAttractionCategory));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TouristAttractionCategory $touristAttractionCategory)
    {
        return $this->sendResponse(new TouristAttractionCategoryResource($touristAttractionCategory));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TouristAttractionCategory $touristAttractionCategory)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'image' => 'base64image|base64mimes:png,jpg,jpeg|base64max:2048',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if(!empty($input['image'])){
            Storage::disk('images')->delete('tourist_attraction/' . basename($touristAttractionCategory->image_filename));
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
            Storage::disk('images')->put("tourist_attraction/" . $name, $img->stream('jpg', 80));
            $input['image_filename'] = "images/tourist_attraction/" . $name;
            unset($input['image']);
        }

        $touristAttractionCategory->update($input);
        return $this->sendResponse(new TouristAttractionCategoryResource($touristAttractionCategory));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TouristAttractionCategory $touristAttractionCategory)
    {
        try {
            Storage::disk('images')->delete('tourist_attraction/' . basename($touristAttractionCategory->image_filename));
            $touristAttractionCategory->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}