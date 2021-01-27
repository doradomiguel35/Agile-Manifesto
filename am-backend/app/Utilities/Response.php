<?php 

namespace App\Utilities;

class Response{

    public static function success($data = []){
        return response()->json($data);
    }

    public static function error404($data = []){
        return response()->json($data, 404);
    }

    public static function error400($data = []){
        return response()->json($data, 400);
    }
}