<?php
   
namespace App\Http\Controllers\API;
   
   
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Resources\Role as RoleResource;
use App\Http\Resources\Permission as PermissionResource;
use DB;

class RoleController extends BaseController
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
        $roleQuery = Role::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);

        $keyword = Arr::get($searchParams, 'keyword', '');

        if (!empty($keyword)) {
            $roleQuery->where('name', 'LIKE', '%' . $keyword . '%');
        }

        return RoleResource::collection($roleQuery->paginate($limit));
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
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $role = Role::create(['name' => $input['name']]);
        $role->syncPermissions($input['permissions']);
   
        return $this->sendResponse(new RoleResource($role));
    } 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $this->sendResponse(new RoleResource($role));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'permissions' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if($role->id == 1){
            return $this->sendError('Update Error.', "Cannot update Administrator role", 403);    
        }

        $permissions = $input['permissions'];
        unset($input['permissions']);
        $role->update($input);
        $role->syncPermissions($permissions);
   
        return $this->sendResponse(new RoleResource($role));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            if($role->id == 1){
                return $this->sendError('Delete Error.', "Cannot delete Administrator role", 403);    
            }
            $role->delete();
        } catch (\Exception $ex) {
            return $this->sendError('Delete Error.', $ex->getMessage(), 403);    
        }
        return $this->sendResponse([]);
    }

    public function getAvailablePermissions(Request $request){
        $permissions = Permission::all();
        return PermissionResource::collection($permissions);
    }
}