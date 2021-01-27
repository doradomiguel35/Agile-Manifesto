<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Values;
use App\Utilities\Response;


use Exception;

class AMValuesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function all(){
        $values = Values::all([
            'id', 'value'
        ]);

        return Response::success($values);
    }

    public function add(Request $request){
        if(!isset($request->input)){
            return Response::error400([
                'message' => 'Value field required'
            ]);
        }

        $value = Values::create([
            'value' => $request->input
        ]);

        return Response::success([
            'message' => 'Values created'
        ]);
    }

    public function update($id, Request $request){
        try{
            $value = Values::findOrFail($id);
            $value->value = $request->input;
            $value->save();
            
            return Response::success([
                'message' => 'Values updated'
            ]);
        }
        
        catch(Exception $e){
            return Response::error404([
                'message' => 'Value not found'
            ]);
        }   
    }

    public function delete($id){
        try{
            $value = Values::findOrFail($id);
            $value->delete();

            return Response::success([
                'message' => 'Value deleted'
            ]);
        }

        catch(Exception $e){
            return Response::error404([
                'message' => 'Value not found'
            ]);
        }   
    }
}
