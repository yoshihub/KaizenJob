<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $responseMessage = (new \App\Services\RegisterMailService())->execute($request);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('/register')->with('message', '何らかのエラーが発生しました。後ほどもう一度実行してください。');
        }

        if (!empty($responseMessage['message'])) {
            return redirect('/register')->with('message', $responseMessage['message']);
        } else {
            return redirect('/register')->with('message', '未登録のメールアドレスの場合、数分以内に登録用のメールアドレスが送られます。');
        }
    }
}
