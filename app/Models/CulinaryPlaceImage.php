<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulinaryPlaceImage extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'culinary_place_id',
        'name',
        'image_filename',
        'type',
    ];

    public function culinary_place()
    {
        return $this->belongsTo(CulinaryPlace::class);
    }
}
