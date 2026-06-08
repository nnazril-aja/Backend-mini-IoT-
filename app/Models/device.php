<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sensorReaading;

class device extends Model
{
    use HasFactory;

    public function sensorData()
{
    return $this->hasMany(sensorReading::class);
}
}
