<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\CulinaryCategory;
use Validator;
use App\Http\Resources\CulinaryCategory as CulinaryCategoryResource;
use Intervention\Image\Facades\Image;

class CulinaryCategoryController extends BaseController
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
        $culinaryCategoryQuery = CulinaryCategory::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');
        $paginate = Arr::get($searchParams, 'paginate', '1');

        if (!empty($keyword)) {
            $culinaryCategoryQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        if (!empty($paginate)) {
            return CulinaryCategoryResource::collection($culinaryCategoryQuery->paginate($limit));
        }
        else {
            return CulinaryCategoryResource::collection($culinaryCategoryQuery->get());
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
        Storage::disk('images')->put("culinary/" . $name, $img->stream('jpg', 80));
        $input['image_filename'] = "images/culinary/" . $name;

        unset($input['image']);

        $culinaryCategory = CulinaryCategory::create($input);
        return $this->sendResponse(new CulinaryCategoryResource($culinaryCategory));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CulinaryCategory $culinaryCategory)
    {
        return $this->sendResponse(new CulinaryCategoryResource($culinaryCategory));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CulinaryCategory $culinaryCategory)
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
            Storage::disk('images')->delete('culinary/' . basename($culinaryCategory->image_filename));
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
            Storage::disk('images')->put("culinary/" . $name, $img->stream('jpg', 80));
            $input['image_filename'] = "images/culinary/" . $name;
            unset($input['image']);
        }

        $culinaryCategory->update($input);
        return $this->sendResponse(new CulinaryCategoryResource($culinaryCategory));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CulinaryCategory $culinaryCategory)
    {
        try {
            Storage::disk('images')->delete('culinary/' . basename($culinaryCategory->image_filename));
            $culinaryCategory->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}