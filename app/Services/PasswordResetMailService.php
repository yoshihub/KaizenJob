<?php

namespace App\Services;

use App\Http\Requests\PasswordResetRequest;
use App\Mail\PasswordResetEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetMailService
{
    public function execute(PasswordResetRequest $request)
    {
        $inputEmail = $request->email;

        if (User::where('email', $inputEmail)->exists()) {
            $token = Hash::make(Carbon::now()->timestamp);
            if (PasswordReset::where('token', $token)->exists()) {
                return ['message' => '既に使用済みか不正なトークンです。'];
            }

            PasswordReset::create([
                'email' => $inputEmail,
                'token' => $token,
            ]);

            Mail::to($inputEmail)->send(new PasswordResetEmail('/password_reset_confirmations?token=' . $token));
        }
    }
}
