@extends('auth.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-center" style="height:400px;">
        <div class="card text-center shadow" style="width: 600px;">
            <p class="fs-4 m-2">パスワードの再設定</p>
            <div class="card-body">
                <p class="card-title">新しいパスワードを入力してください</p>
                <form method="post" action="/password_reset_confirmations">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <label for="password" class="col-md-3 col-form-label">パスワード</label>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control" placeholder="8文字以上の英数字を入力">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="password_confirmation" class="col-md-3 col-form-label">パスワード確認</label>
                        <div class="col-md-8">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="8文字以上の英数字を入力">
                        </div>
                    </div>

                    @error('password')
                    <p class="text-danger m-1">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror

                    <input type="hidden" name="token" value="{{ $token }}">

                    <input type="submit" value="パスワード再設定" class="btn btn-success mt-3">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
