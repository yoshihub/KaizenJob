<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterConfirmationsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\PasswordResetConfirmationsController;





Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

// 登録処理
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::get('register_confirmations', [RegisterConfirmationsController::class, 'index']);
// ログイン・ログアウト処理
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('logout', [LogoutController::class, 'store'])->name('logout');
// パスワードリセット
Route::resource('password_reset', PasswordResetController::class)->only(['create', 'store']);
Route::get('password_reset_confirmations', [PasswordResetConfirmationsController::class, 'index']);
Route::patch('password_reset_confirmations', [PasswordResetConfirmationsController::class, 'update']);
