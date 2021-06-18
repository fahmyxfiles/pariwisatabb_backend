<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Regency;
use App\Models\Province;
use Validator;
use App\Http\Resources\Regency as RegencyResource;
use App\Http\Resources\Province as ProvinceResource;

class RegencyController extends BaseController
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
        $regencyQuery = Regency::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $regencyQuery->where('name', 'LIKE', '%' . $keyword . '%');
            $regencyQuery->orWhere('description', 'LIKE', '%' . $keyword . '%');
        }

        return RegencyResource::collection($regencyQuery->paginate($limit));
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
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'timezone_offset' => 'required|numeric',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $name = time().'_'.$request->file('image')->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('regency', $name, 'images');
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
    public function show(Regency $regency)
    {
        return $this->sendResponse(new RegencyResource($regency));
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
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'timezone_offset' => 'required|numeric',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        if($request->file('image')){
            Storage::disk('images')->delete('regency/' . basename($regency->image_filename));
            $name = time().'_'.$request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('regency', $name, 'images');
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
    public function destroy(Regency $regency)
    {
        try {
            Storage::disk('images')->delete('regency/' . basename($regency->image_filename));
            $regency->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function getAvailableProvinces(Request $request){
        $province = Province::all();
        return ProvinceResource::collection($province);
    }
}