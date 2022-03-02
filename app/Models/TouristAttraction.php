<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristAttraction extends Model
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
        return $this->hasMany(TouristAttractionImage::class);
    }

    public function category(){
        return $this->belongsTo(TouristAttractionCategory::class);
    }

    public function pricings()
    {
        return $this->hasMany(TouristAttractionPricing::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'tourist_attraction_has_facilities', 'tourist_attraction_id', 'facility_id');
    }
}
