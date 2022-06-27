<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(!$token = auth()->attempt($request->only('email', 'password'))) {
            // return response(null, 401);
            // return response(null, 401);
            $data = [
                ['Your account or password is incorrect']
            ];
            return response()->json(['errors'=>$data], 401);
        }

        return response()->json(compact('token'));
    }
}
