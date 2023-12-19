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
            return response([
                'message' => 'Invalid Fields',
            ],402);
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
     * Override irrigation.
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

        return response([
            'water' => $arduino->is_water_active
        ]);
    }

    /**
     * Tuns on Override irrigation.
     */
    public function water_on(Request $request)
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

        $arduino->is_water_active = true;
        $arduino->save();            

        return response($arduino);
    }


    /**
     * Tunn off Override irrigation.
     */
    public function water_off(Request $request)
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

        $arduino->is_water_active = false;
        $arduino->save();            

        return response($arduino);
    }

    /**
     * Switchs Override irrigation.
     */
    public function water_switch(Request $request)
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

        $arduino->is_water_active =!$arduino->is_water_active;
        $arduino->save();            

        return response($arduino);
    }

    /**
     * Upload Image and Stores it.
     */
    public function storeImage(Request $request)
    {
        $request->validate([
            'imei' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10240'
        ]);

        $arduino = Arduino::where('imei', $request->imei)->first();  

        $imageName = time().'.'.$request->image->extension();

        //Store in Storage Folder
        $path = $request->image->storeAs('images', $imageName);

        $arduino->img_path = $path;
        $arduino->save();            

        return response($arduino);
    }

    /**
     * Upload Object and Stores it.
     */
    public function storeObject(Request $request)
    {
        $request->validate([
            'imei' => 'required',
            'object' => 'required',
        ]);

        $arduino = Arduino::where('imei', $request->imei)->first();  

        $objectName = time().'.'.'obj';

        //Store in Storage Folder
        $path = $request->object->storeAs('objects', $objectName);

        $arduino->obj_path = $path;
        $arduino->save();   

        return response($arduino);
    }


}
