<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterConfirmationsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $responseMessage = (new \App\Services\RegisterService())->execute($request);
        } catch (Exception $e) {
            DB::rollback();
            return redirect('/register')->with('message', '何らかのエラーが発生しました。後ほどもう一度実行してください。');
        }

        if (!empty($responseMessage['message'])) {
            return redirect('/register')->with('message', $responseMessage['message']);
        } else {
            return redirect('/login')->with('message', 'ユーザー登録が完了しました。');
        }
    }
}
