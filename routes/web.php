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
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('profile', ProfileController::class)->only(['index', 'create', 'store']);
    Route::get('password_update', [PasswordUpdateController::class, 'index']);
    Route::post('password_update', [PasswordUpdateController::class, 'store']);
});

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
