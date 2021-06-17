<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Validator;
use App\Http\Resources\User as UserResource;

class UserController extends BaseController
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
        $userQuery = User::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $userQuery->where('email', 'LIKE', '%' . $keyword . '%');
            $userQuery->orWhere('full_name', 'LIKE', '%' . $keyword . '%');
        }

        return UserResource::collection($userQuery->paginate($limit));
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
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'roles' => 'required|array',
            'permissions' => 'array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['password'] = Hash::make($input['password']);
        
        $roles = $input['roles'];
        $permissions = [];
        if(isset($input['permissions'])){
            $permissions = $input['permissions'];
        }
        unset($input['roles']);
        unset($input['permissions']);

        $user = User::create($input);
        $user->syncRoles($roles);
        $user->syncPermissions($permissions);
   
        return $this->sendResponse(new UserResource($user));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->sendResponse(new UserResource($user));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'full_name' => 'required',
            'email' => 'required|email',
            'password' => 'required_with:c_password',
            'c_password' => 'required_with:password|same:password',
            'roles' => 'required|array',
            'permissions' => 'array',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if(isset($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }

        $roles = $input['roles'];
        $permissions = [];
        if(isset($input['permissions'])){
            $permissions = $input['permissions'];
        }
        unset($input['roles']);
        unset($input['permissions']);

        $user->update($input);
        $user->syncRoles($roles);
        $user->syncPermissions($permissions);
   
        return $this->sendResponse(new UserResource($user));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }
}