<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDevice extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => array_intersect_key($this->user->toArray(), array_flip(['full_name', 'email'])),
            'device_ip' => $this->device_ip,
            'device_data' => $this->device_data,
        ];
    }
}
