<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class AuthController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
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
        $success['token'] =  $user->createToken(env('APP_TOKEN_KEY'))->accessToken;
        $success['user'] =  $user;
   
        return $this->sendResponse($success);
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken(env('APP_TOKEN_KEY'))-> accessToken; 
            $success['user'] =  $user;
   
            return $this->sendResponse($success);
        } 
        else{ 
            return $this->sendError('Invalid Email or Password');
        } 
    }

    public function users(Request $request){
        $user = Auth::user();
        if($user){
            return $this->sendResponse($user);
        }
        else {
            return $this->sendError('Unauthorized.');
        }
    }
}