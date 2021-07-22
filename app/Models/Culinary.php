<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culinary extends Model
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
        'description',
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

    public function culinary_places()
    {
        return $this->belongsToMany(CulinaryPlace::class, 'culinary_has_culinary_place', 'culinary_id', 'culinary_place_id');
    }
}
