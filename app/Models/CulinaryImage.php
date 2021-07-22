<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulinaryImage extends Model
{
    use HasFactory;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'culinary_id',
        'name',
        'image_filename',
        'type',
    ];

    public function culinary()
    {
        return $this->belongsTo(Culinary::class);
    }
}
