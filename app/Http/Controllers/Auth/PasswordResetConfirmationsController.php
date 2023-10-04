<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\PasswordReset;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasswordResetConfirmationsController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->input('token');
        if (empty($token)) {
            return redirect('/login')->with('message', 'トークンが存在しないか無効です。');
        }

        if (!PasswordReset::where('token', $token)->exists()) {
            return redirect('/login')->with('message', '既に再設定済みか無効な操作です。');
        }

        return view('auth.password_reset_confirmations.index', ['token' => $token]);
    }

    public function update(PasswordUpdateRequest $request)
    {
        try {
            DB::beginTransaction();

            $responseMessage = (new \App\Services\PasswordResetService())->execute($request);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/login')->with('message', '何らかのエラーが発生しました。後ほどもう一度実行してください。');
        }

        if (!empty($responseMessage['message'])) {
            return redirect('/login')->with('message', $responseMessage['message']);
        } else {
            return redirect('/login')->with('message', 'パスワードの再設定が完了しました。');
        }
    }
}
