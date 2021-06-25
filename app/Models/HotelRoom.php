<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hotel_id',
        'name',
        'description',
    ];

    protected $with = ['images', 'pricings', 'facilities'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function pricings()
    {
        return $this->hasMany(HotelRoomPricing::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'hotel_room_has_facilities', 'hotel_room_id', 'facility_id');
    }
}
