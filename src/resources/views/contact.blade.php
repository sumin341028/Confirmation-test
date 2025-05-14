<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>これはH1タイトル（３２px）</h1>
    <h2>これはH2タイトル（２４px）</h2>

    <p class="small">これはsmall（１２px）の文字です</p>
    <p class="nomal">これはnomal（１６px）の文字です</p>
    <p class="large">これはlarge（２4px）の文字です</p>
    <div class="box1">これは padding: 10px のボックス</div>
<br>
<div class="box2">これは padding: 20px のボックス</div>
<br>
<div class="box3">これは padding: 10pxとmargin: 20px のボックス</div>
<br>
<div class="box4">上下30px,左右10pxのpaddingのボックス/上下10px,左右30pxのmarginのボックス</div>
<form action="/contact" method="POST">
    @csrf
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
            @endforeach
    </ul>
    @endif
    <form action="/contact" method="POST">
    <input type="text" name="name" placeholder="名前を入力してください" value="{{ old('name') }}">
    <br>
    <input type="text" name="email" placeholder="メールアドレスを入力してください" value="{{ old('email') }}">
    <br>
    <textarea name="message" placeholder="メッセージを入力してください" >{{ old('message') }}</textarea>
    <br>
    <button type="submit">送信</button> 
    </form>
</body>
</html>