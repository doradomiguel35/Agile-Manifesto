<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Principles;
use App\Utilities\Response;

use Exception;

class AMPrinciplesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function all(){
        $values = Principles::all([
            'id', 'principle'
        ]);

        return Response::success($values);
    }

    public function add(Request $request){
        if(!isset($request->input)){
            return Response::error400([
                'message' => 'Principle field required'
            ]);
        }

        $value = Principles::create([
            'principle' => $request->input
        ]);

        return Response::success([
            'message' => 'Principle created'
        ]);
    }

    public function update($id, Request $request){
        try{
            $principle = Principles::findOrFail($id);
            $principle->principle = $request->input;
            $principle->save();

            return Response::success([
                'message' => 'Principle updated'
            ]);
        }
        
        catch(Exception $e){
            return Response::error404([
                'message' => 'Principle not found'
            ]);
        }   
    }

    public function delete($id){
        try{
            $value = Principles::findOrFail($id);
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
