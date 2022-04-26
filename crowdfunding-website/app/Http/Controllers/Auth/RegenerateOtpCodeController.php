<?php

namespace App\Http\Controllers\Auth;

use App\Events\OtpRequestEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegenerateOtpCodeController extends Controller
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
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        event(new OtpRequestEvent($user));

        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'otp berhasil digenerate, silakan cek email untuk melihat kode otp',
            'data' => $data
        ]);
    }
}
