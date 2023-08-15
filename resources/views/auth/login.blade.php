@extends('auth.app')

@section('content')
<div class="text-center">
    <p class="navbar-brand d-flex justify-content-center">
        <img src="{{ asset('image/gears.png') }}" alt="アイコン画像" class="me-1" width="50" height="50">
        <span class="h1">KaizenJob</span>
    </p>
    <div class="container text-center">
        <div class="row justify-content-center">
            <form action="{{ route('login') }}" method="POST" class="border rounded bg-white shadow col-md-6 p-3">
                @csrf
                @if (session('message'))
                <div class="alert alert-info text-center alert-dismissible alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h2 class="mt-3 mb-4">ログイン</h2>
                <div class="mb-3">
                    <input name="email" type="email" class="form-control w-75 m-auto @error('email') is-invalid @enderror" placeholder="メールアドレス" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control w-75 m-auto @error('password') is-invalid @enderror" placeholder="パスワード">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label" for="remember">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            ログイン状態を保持する
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success px-5 mb-2 rounded-pill">ログイン</button><br>
                <a class="btn btn-link" href="/password_reset/create">
                    パスワードを忘れた方はこちら
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
