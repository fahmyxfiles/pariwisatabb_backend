<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestHouseRoomPricing extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guest_house_room_id',
        'type',
        'date',
        'price',
    ];

    public function room()
    {
        return $this->belongsTo(GuestHouseRoom::class);
    }
}
