<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ一覧</title>
</head>
<body>
<h1>お問い合わせ一覧</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>メッセージ</th>
        <th>作成日時</th>
    </tr>
@foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->message }}</td>
        <td>{{ $contact->created_at }}</td>
    </tr>
@endforeach
</table>

    
</body>
</html>