<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestHouseRoom extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guest_house_id',
        'name',
        'description',
        'num_of_guest',
        'room_size',
        'bed_size',
    ];

    protected $with = ['guest_house'];

    public function guest_house()
    {
        return $this->belongsTo(GuestHouse::class);
    }

    public function images()
    {
        return $this->hasMany(GuestHouseImage::class);
    }

    public function pricings()
    {
        return $this->hasMany(GuestHouseRoomPricing::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'guest_house_room_has_facilities', 'guest_house_room_id', 'facility_id');
    }
}
