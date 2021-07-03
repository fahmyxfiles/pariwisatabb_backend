<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestHouse extends Model
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
        'name',
        'address',
        'postal_code',
        'map_coordinate',
        'map_center',
        'description',
    ];

    protected $with = ['regency', 'images'];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function images()
    {
        return $this->hasMany(GuestHouseImage::class);
    }

    public function rooms()
    {
        return $this->hasMany(GuestHouseRoom::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'guest_house_has_facilities', 'guest_house_id', 'facility_id');
    }
}
