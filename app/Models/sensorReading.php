<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\device;

class sensorReading extends Model
{
    use HasFactory;

    protected $table = 'sensor_readings';

    protected $fillable = [
        'device_id', 'temperature', 'humidity', 'ph', 'tds'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
