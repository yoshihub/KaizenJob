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
</body>

</html>
