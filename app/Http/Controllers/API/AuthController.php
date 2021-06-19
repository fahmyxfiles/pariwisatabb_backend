<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Resources\User as UserResource;
   
class AuthController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->abilities = $this->getAbilities($user);
        $success['token'] =  $user->createToken(env('APP_TOKEN_KEY'))->accessToken;
        $success['user'] =  new UserResource($user);
   
        return $this->sendResponse($success);
    }
    */
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $user->abilities = $this->getAbilities($user);
            $success['token'] =  $user->createToken(env('APP_TOKEN_KEY'))-> accessToken; 
            $success['user'] =  new UserResource($user);
   
            return $this->sendResponse($success);
        } 
        else { 
            return $this->sendError('Invalid Email or Password');
        } 
    }

    private function getAbilities($user){
        $role_permission = [];
        foreach($user->roles as $role){
            $role = Role::findById($role->id);
            $perms = $role->permissions->toArray();
            foreach($perms as $perm){
                $role_permission[] = ['action' => $perm['action'], 'subject' => $perm['subject']];
            }
        }
        return array_merge($role_permission, $user->permissions->toArray());
    }

    public function users(Request $request){
        $user = Auth::user();
        if($user){
            $user->abilities = $this->getAbilities($user);
            return $this->sendResponse(new UserResource($user));
        }
        else {
            return $this->sendError('Unauthorized.');
        }
    }
}