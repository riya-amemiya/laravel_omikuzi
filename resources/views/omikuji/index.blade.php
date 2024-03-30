<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>おみくじ</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>おみくじ</h1>
        <form action="{{ route('omikuji.draw', ['page' => 'default']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">普通のおみくじを引く</button>
        </form>
        <form action="{{ route('omikuji.draw', ['page' => 'great']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">大吉が出やすいおみくじを引く</button>
        </form>
        <form action="{{ route('omikuji.draw', ['page' => 'middle']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-warning">中吉が出やすいおみくじを引く</button>
        </form>
        <form action="{{ route('omikuji.draw', ['page' => 'small']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">小吉が出やすいおみくじを引く</button>
        </form>
        <form action="{{ route('omikuji.draw', ['page' => 'bad']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-secondary">凶が出やすいおみくじを引く</button>
        </form>
        <form action="{{ route('omikuji.reset') }}" method="post" onsubmit="return confirm('本当にリセットしますか？')">
            @csrf
            <button type="submit" class="btn btn-danger">リセット</button>
        </form>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <h2>過去の結果</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>結果</th>
                    <th>日時</th>
                    <th>引いたおみくじ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($omikujis as $omikuji)
                <tr>
                    <td>{{ $omikuji->result }}</td>
                    <td>{{ $omikuji->created_at }}</td>
                    <td>
                        {{
                            $omikuji->page == 'default' ? '普通のおみくじ' : (
                                $omikuji->page == 'great' ? '大吉が出やすいおみくじ' : (
                                    $omikuji->page == 'middle' ? '中吉が出やすいおみくじ' : (
                                        $omikuji->page == 'small' ? '小吉が出やすいおみくじ' : '凶が出やすいおみくじ'
                                    )
                                )
                            )
                        }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>