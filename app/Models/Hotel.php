<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
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
        'description',
    ];

    protected $with = ['regency', 'images'];

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'hotel_has_facilities', 'hotel_id', 'facility_id');
    }
}
