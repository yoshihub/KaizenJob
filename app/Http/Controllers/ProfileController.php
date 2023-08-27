<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('Profiles/Index');
    }

    public function create()
    {
        return Inertia::render('Profiles/Create', [
            'user' => Auth::user(),
        ]);
    }

    public function store(ProfileStoreRequest $request)
    {
        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('profile.index')->with('success', 'プロフィールを変更しました');
    }
}
