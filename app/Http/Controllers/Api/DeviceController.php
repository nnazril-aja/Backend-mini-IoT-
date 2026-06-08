<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;

class DeviceController extends Controller
{
    
    public function index()
        {
            $devices = device::all();
        
            return response()->json([
            'status' => 'success',
            'data' => $devices
            ], 200);
        }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
   
        $device = new Device();
        $device->name = $request->name;
        $device->location = $request->location;
        $device->status = 'active';
        $device->save();

        return response()->json([
            'status' => 'success',
            'message' => 'device ditambahkan',
            'data' => $device
        ], 201);
    }
}
