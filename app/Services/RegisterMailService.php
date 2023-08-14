<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterEmail;
use App\Models\RegisterSet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterMailService
{
    public function execute(RegisterRequest $request)
    {
        $params = $request->all();

        if (User::where('email', $params['email'])->exists()) {
            return ['message' => '未登録のメールアドレスの場合、数分以内に登録用のメールが送られます。'];
        }

        $token = Hash::make(Carbon::now()->timestamp);

        if (RegisterSet::where('token', $token)->exists()) {
            return ['message' => '既に使用済みか不正なトークンです。'];
        }

        RegisterSet::create([
            'name'     => $params['name'],
            'email'    => $params['email'],
            'password' => Hash::make($params['password']),
            'token'    => $token,
        ]);

        Mail::to($params['email'])->send(new RegisterEmail('/register_confirmations?token=' . $token));
    }
}
