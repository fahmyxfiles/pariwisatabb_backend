<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
    ];

    public function category(){
        return $this->belongsTo(FacilityCategory::class);
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_has_facilities', 'facility_id', 'hotel_id');
    }
}
