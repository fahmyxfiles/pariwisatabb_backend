<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\Permission as PermissionResource;
use App\Http\Resources\Role as RoleResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request) , [
            'permissions' => PermissionResource::collection($this->permissions),
            'roles' => Role::collection($this->roles),
        ]);
    }
}
