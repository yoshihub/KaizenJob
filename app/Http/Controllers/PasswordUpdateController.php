<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

class PasswordUpdateController extends Controller
{
    public function index()
    {
        return Inertia::render('PasswordUpdates/Index');
    }

    public function store(PasswordUpdateStoreRequest $request)
    {
        $user = Auth::user();
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route('profile.index')->with('success', 'パスワードを変更しました');
    }
}
