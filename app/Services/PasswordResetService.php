<?php

namespace App\Services;

use App\Http\Requests\PasswordUpdateRequest;
use App\Models\PasswordReset;
use App\Models\User;

class PasswordResetService
{
    public function execute(PasswordUpdateRequest $request)
    {
        $params = $request->all();
        $token = $params['token'] ?? '';
        if (empty($token)) {
            return ['message' => 'トークンが存在しないか無効です。'];
        }

        $passwordReset = PasswordReset::where('token', $params['token'])->get()->first();
        if (is_null($passwordReset)) {
            return ['message' => '既に使用済みか不正なトークンです。'];
        }

        $user = User::where('email', $passwordReset->email)->get()->first();
        if (is_null($user)) {
            return ['message' => '不正なトークンです。'];
        }

        $user->update(['password' => bcrypt($params['password'])]);
        $passwordReset->delete();
    }
}
