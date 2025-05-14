<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせありがとうございます</title>
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body>
    <h1>{{$inputs['name']}}さん、送信ありがとう！！！</h1>
    <p>メールアドレス: {{$inputs['email']}}</p>
    <pre>メッセージ: {{$inputs['message']}}</pre>
</body>
</html>