<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class PasswordResetController extends Controller
{
    public function create()
    {
        return view('auth.password_reset.create');
    }

    public function store(PasswordResetRequest $request)
    {
        try {
            DB::beginTransaction();

            $responseMessage = (new \App\Services\PasswordResetMailService())->execute($request);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return redirect('/login')->with('message', '何らかのエラーが発生しました。後ほどもう一度実行してください。');
        }

        if (!empty($responseMessage['message'])) {
            return redirect('/register')->with('message', $responseMessage['message']);
        } else {
            return redirect('/register')->with('message', '登録済みメールアドレスの場合、数分以内にパスワード再設定用のメールが送られます。');
        }
    }
}
