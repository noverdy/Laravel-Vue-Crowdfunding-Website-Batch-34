<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
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
            'email' => 'required|unique:users,email|email',
            'name' => 'required'
        ]);
        $validatedData['role_id'] = Role::all()->where('name', 'user')->first()->id;
        $user = User::create($validatedData);

        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'User baru berhasil ditambahkan, silakan cek email untuk melihat kode OTP',
            'data' => $data
        ]);
    }
}
