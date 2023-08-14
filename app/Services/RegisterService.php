<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RegisterSet;

class RegisterService
{
    public function execute(Request $request)
    {
        $token = $request->input('token');
        $registerSet = RegisterSet::where('token', $token)->get()->first();

        if (is_null($registerSet)) {
            return ['message' => '既に使用済みか不正なトークンです。'];
        }

        User::create([
            'name' => $registerSet['name'],
            'email' => $registerSet['email'],
            'password' => $registerSet['password'],
        ]);
        $registerSet->delete();
    }
}
