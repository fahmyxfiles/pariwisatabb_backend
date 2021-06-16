<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\UserDevice;
use Validator;
use App\Http\Resources\UserDevice as UserDeviceResource;

class UserDeviceController extends BaseController
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
        $userDeviceQuery = UserDevice::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        return UserDeviceResource::collection($userDeviceQuery->paginate($limit));
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
            'user_id' => 'required|exists:users,id',
            'device_ip' => 'required',
            'device_data' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $userDevice = UserDevice::create($input);
   
        return $this->sendResponse(new UserDeviceResource($userDevice));
    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserDevice $userDevice)
    {
        return $this->sendResponse(new UserDeviceResource($userDevice));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDevice $userDevice)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'user_id' => 'required|exists:users,id',
            'device_ip' => 'required',
            'device_data' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $userDevice->update($input);
   
        return $this->sendResponse(new UserDeviceResource($userDevice));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDevice $userDevice)
    {
        try {
            $userDevice->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
   
        return $this->sendResponse([]);
    }
}