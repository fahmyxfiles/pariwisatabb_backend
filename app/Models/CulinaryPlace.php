<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulinaryPlace extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'regency_id',
        'category_id',
        'name',
        'address',
        'postal_code',
        'map_coordinate',
        'map_center',
        'description',
        'instagram_hashtags',
    ];

    protected $with = ['regency', 'images'];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function images()
    {
        return $this->hasMany(CulinaryImage::class);
    }

    public function culinaries()
    {
        return $this->belongsToMany(Culinary::class, 'culinary_has_culinary_place', 'culinary_place_id', 'culinary_id');
    }
}
