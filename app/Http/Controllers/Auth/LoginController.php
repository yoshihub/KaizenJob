<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStoreRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/posts';
    protected $maxAttempts = 10;
    protected $decayMinutes = 5;

    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginStoreRequest $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        if (!$this->attemptLogin($request)) {
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }

        return $this->sendLoginResponse($request);
    }
}
