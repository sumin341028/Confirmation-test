@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header-button')
    <a href="{{ route('register') }}" class="header-btn">Register</a>
@endsection

@section('content')
  <h2 class="form-title">Login</h2> 
  <div class="form-wrapper">
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="form-group">
          <label>メールアドレス</label>
          <input type="email" name="email" value="{{ old('email') ?? '' }}" placeholder="例：test@example.com">
          @if ($errors->has('email'))
    <p class="error">{{ $errors->first('email') }}</p>
@endif
        </div>

        <div class="form-group">
          <label>パスワード</label>
          <input type="password" name="password" placeholder="例：coachtech1106">
          @if ($errors->has('password'))
    <p class="error">{{ $errors->first('password') }}</p>
@endif
        </div>

        <button type="submit">ログイン</button>
    </form>
  </div>
@endsection