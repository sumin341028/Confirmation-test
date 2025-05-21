@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<main class="confirm-container">
    <h2 class="confirm-title">Confirm</h2>

    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>{{ $inputs['last_name'] }}　{{ $inputs['first_name'] }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                @if($inputs['gender'] == 1) 男性
                @elseif($inputs['gender'] == 2) 女性
                @else その他
                @endif
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $inputs['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $inputs['tel1'] }}{{ $inputs['tel2'] }}{{ $inputs['tel3'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $inputs['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $inputs['building'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $categoryName }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{!! nl2br(e($inputs['detail'])) !!}</td>
        </tr>
    </table>

    <div class="button-group">
        <form method="POST" action="{{ route('contacts.send') }}">
            @csrf
            @foreach($inputs as $name => $value)
                @if(is_array($value))
                    @foreach($value as $v)
                        <input type="hidden" name="{{ $name }}[]" value="{{ $v }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endif
            @endforeach
            <button type="submit" class="btn submit">送信</button>
        </form>
        <form method="POST" action="{{ route('contacts.back') }}">
    @csrf
    @foreach($inputs as $name => $value)
        @if(is_array($value))
            @foreach($value as $v)
                <input type="hidden" name="{{ $name }}[]" value="{{ $v }}">
            @endforeach
        @else
            <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endif
    @endforeach
    <button type="submit" class="btn back">修正</button>
</form>
    </div>
</main>
@endsection