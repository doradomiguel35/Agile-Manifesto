<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

use App\Utilities\Response;

class AuthController extends Controller{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if(isset($user)){
            if(!Hash::check($request->password, $user->password)){
                return Response::error400([
                    'message' => 'Incorrect password'
                ]);
            }

            $token = $user->createToken('API Token')->accessToken;
            return Response::success([
                'token' => $token
            ]);
        }

        return Response::error400([
            'message' => 'Incorrect email'
        ]);
    }

    public function logout(){
        $user = Auth::user();

        if(Auth::check()){
            $user->token()->revoke();
            return Response::success([
                'message' => 'Logged out'
            ]);
        }

        return Response::error400([
            'message' => 'Not Logged in'
        ]);
    }
}