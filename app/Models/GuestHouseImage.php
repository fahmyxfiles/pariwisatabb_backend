<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestHouseImage extends Model
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
        'guest_house_room_id',
        'name',
        'image_filename',
        'type',
    ];

    public function guest_house()
    {
        return $this->belongsTo(GuestHouse::class);
    }

    public function room()
    {
        return $this->belongsTo(GuestHouseRoom::class);
    }
}
