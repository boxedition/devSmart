<?php

namespace App\Http\Controllers;

use App\Models\Arduino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArduinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Arduino::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imei'=> ['required'],
        ]);

        if($validator->fails()){
            //
        }

        $arduino = Arduino::where('imei', $request->imei)->first();

        if ($arduino) {
            return response([
                'message' => 'IMEI Exists.',
            ],401);
        }
        
        $arduino = new Arduino;
        $arduino->imei = $request->imei;
        $arduino->save();

        return response($arduino);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imei'=> ['required'],
        ]);

        if($validator->fails()){
            //
        }

        $arduino = Arduino::where('imei', $request->imei)->first();

        return response( $arduino );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arduino $arduino)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arduino $arduino)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arduino $arduino)
    {
        //
    }
}
