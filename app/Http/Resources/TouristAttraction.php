<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TouristAttraction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $ret = parent::toArray($request);
        var_dump($ret);
        if(is_array($ret['instagram_hashtags'])){
            $ret['instagram_hashtags'] = explode(",", $ret['instagram_hashtags']);
        }
        return $ret;
    }
}
