<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'temperature',
        'humidity',
        'soil_value',
        'soil_percentage',
    ];

    public function arduino()
    {
        return $this->belongsTo(Arduino::class);
    }
}
