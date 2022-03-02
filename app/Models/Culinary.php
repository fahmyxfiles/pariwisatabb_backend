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

    public function category(){
        return $this->belongsTo(CulinaryCategory::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'culinary_has_facilities', 'tourist_attraction_id', 'facility_id');
    }
    
}
