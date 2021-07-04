<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouristAttractionPricing extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tourist_attraction_id',
        'type',
        'date',
        'age_type',
        'age_min',
        'age_max',
        'price',
        'note',
    ];

    public function tourist_attraction()
    {
        return $this->belongsTo(TouristAttraction::class);
    }
}
