<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    use HasFactory;

    protected $fillable = [
        'imei',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_water_active' => 'boolean'
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

}
