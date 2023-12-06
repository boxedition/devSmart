<?php

namespace App\Http\Controllers;

use App\Models\Arduino;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imei'=> ['required'],
            'temperature'=> ['required'],
            'humidity'=> ['required'],
            'soil_value'=> ['required'],
            'soil_percentage'=> ['required'],
        ]);

        if($validator->fails()){
            return response([
                'message' => 'Invalid Fields',
            ],402);
        }

        $arduino = Arduino::where('imei', $request->imei)->first();
        if (!$arduino) {
            return response([
                'message' => 'No Arduino founded.',
            ],403);
        }

        $log = new Log([
            // Add log information
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
            'soil_value' => $request->soil_value,
            'soil_percentage' => $request->soil_percentage,
    
        ]);

        $arduino->logs()->save($log);
        
        return response($log);
    }

    /**
     * Display the specified resource.
     */
    public function water(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imei'=> ['required'],
        ]);

        if($validator->fails()){
            return response([
                'message' => 'Invalid Fields',
            ],402);
        }

        
        $arduino = Arduino::where('imei', $request->imei)->first();
        
        $log = $arduino->logs()->latest()->limit(1)->get();

        return response($log)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        //
    }
}
