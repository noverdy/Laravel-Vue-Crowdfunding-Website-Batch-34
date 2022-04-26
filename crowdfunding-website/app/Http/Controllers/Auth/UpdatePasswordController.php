<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
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
            'email' => 'email|required',
            'password' => 'required|confirmed|min:6'
        ]);

        User::where('email', $validatedData['email'])->update(['password' => Hash::make($validatedData['password'])]);

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Password berhasil diubah',
        ]);
    }
}
