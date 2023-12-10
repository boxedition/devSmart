<?php

namespace App\Http\Controllers;

use App\Models\Arduino;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogController extends Controller
{

    /**
     * Creates a newly created Log.
     */
    public function index(Request $request)
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
        
        if (!$arduino) {
            return response([
                'message' => 'No Arduino founded.',
            ],403);
        }

        $logs = $arduino->logs()->latest()->limit(30)->get();;
        
        return response($logs);
    }

    /**
     * Creates a newly created Log.
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


}
