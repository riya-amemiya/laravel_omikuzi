<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おみくじ結果</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>おみくじ結果</h1>
        <div class="result">
            <p>結果: {{ $result }}</p>
            <p>メッセージ: {{ $message }}</p>
        </div>
        <a href="{{ route('omikuji.index') }}" class="btn btn-primary">もう一度引く</a>
    </div>
</body>

</html>