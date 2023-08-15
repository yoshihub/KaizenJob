@extends('auth.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-center" style="height:400px;">
        <div class="card text-center shadow" style="width: 550px;">
            <p class="fs-4 m-2">パスワードの再設定</p>
            <div class="card-body">
                <label class="card-title">現在のメールアドレスを入力してください</label>
                <form method="post" action="/password_reset">
                    @csrf
                    <input type="email" name="email" value="{{old('email')}}" placeholder="メールアドレス" class="form-control">

                    @error('email')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="submit" value="再設定メールを送信" class="btn btn-success mt-4">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
