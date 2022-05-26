<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!$token = auth()->attempt($validatedData)) {
            return response()->json(['error' => 'Email atau Password tidak ditemukan'], 401);
        }

        $data['token'] = $token;
        $data['user'] = auth()->user();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'User berhasil login',
            'data' => $data
        ]);
    }
}
