<!DOCTYPE HTML>
<html lang="ja">

<head>
    <title>LaravelTodo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

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
                            <input type="password" name="password" class="form-control" placeholder="新しいパスワードを入力">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="password_confirmation" class="col-md-3 col-form-label">パスワード確認</label>
                        <div class="col-md-8">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="確認用パスワードを入力">
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

</body>

</html>
