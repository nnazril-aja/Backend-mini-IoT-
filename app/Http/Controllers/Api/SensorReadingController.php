<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\sensorReading;
use App\Models\device;
use Illuminate\Http\Request;

class SensorReadingController extends Controller
{
    
    public function index()
    {
        $data = sensorReading::orderBy('id', 'desc')->get();
    
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric|between:0,100',
            'ph' => 'required|numeric|between:0,14',
            'tds' => 'required|numeric'
        ]);

        $simpan = new sensorReading();
        $simpan->device_id = $request->device_id;
        $simpan->temperature = $request->temperature;
        $simpan->humidity = $request->humidity;
        $simpan->ph = $request->ph;
        $simpan->tds = $request->tds;
        $simpan->save();

        return response()->json([
            'status' => 'success',
            'message' => 'suddah masuk',
            'data' => $simpan
        ], 201);
    }

    public function latest()
    {
        $terbaru = sensorReading::orderBy('id', 'desc')->first();
        
        return response()->json([
            'status' => 'success',
            'data' => $terbaru
        ], 200);
    }

    public function summary()
    {
        $total_devices = device::count();
        $latest = sensorReading::orderBy('id', 'desc')->first();

        $temp = 0; $hum = 0; $ph = 0; $tds = 0; $waktu = null;

        if ($latest != null) {
            $temp = $latest->temperature;
            $hum = $latest->humidity;
            $ph = $latest->ph;
            $tds = $latest->tds;
            $waktu = $latest->created_at->format('Y-m-d H:i:s');
        }

        return response()->json([
            'total_devices' => $total_devices,
            'latest_temperature' => $temp,
            'latest_humidity' => $hum,
            'latest_ph' => $ph,
            'latest_tds' => $tds,
            'last_update' => $waktu
        ], 200);
    }
}
