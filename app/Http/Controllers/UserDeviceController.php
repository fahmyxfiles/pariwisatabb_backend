<?php
   
namespace App\Http\Controllers;
   
   
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\UserDevice;
use Validator;
use App\Http\Resources\UserDevice as UserDeviceResource;

class UserDeviceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_devices = UserDevice::all();
    
        return $this->sendResponse(UserDeviceResource::collection($user_devices), null, 200);
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
   
        $user_device = UserDevice::create($input);
   
        return $this->sendResponse(new UserDeviceResource($user_device));
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_device = UserDevice::find($id);
  
        if (is_null($user_device)) {
            return $this->sendError('Data not found.');
        }
   
        return $this->sendResponse(new UserDeviceResource($user_device));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDevice $user_device)
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
        $user_device->update($input);
   
        return $this->sendResponse(new UserDeviceResource($user_device));
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDevice $user_device)
    {
        $user_device->delete();
   
        return $this->sendResponse([]);
    }
}