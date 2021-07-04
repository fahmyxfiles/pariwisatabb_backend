<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;
    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id',
        'name',
        'description',
        'image_filename',
        'timezone_offset',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function guest_houses()
    {
        return $this->hasMany(GuestHouse::class);
    }

    public function tourist_attractions()
    {
        return $this->hasMany(TouristAttraction::class);
    }
}
