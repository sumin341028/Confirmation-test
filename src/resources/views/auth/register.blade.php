@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-button')
    <a href="{{ route('login') }}" class="header-btn">Login</a>
@endsection

@section('content')
  <h2 class="form-title">Register</h2>
  <div class="form-wrapper">
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="form-group">
            <label>お名前</label>
            <input type="text" name="name" placeholder="例：山田　太郎"value="{{ old('name') }}">
            @error('name')
    <p class="error">{{ $message }}</p>
  @enderror
        </div>

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" placeholder="例：test@example.com"value="{{ old('email') }}">
            @error('email')
    <p class="error">{{ $message }}</p>
  @enderror
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password" placeholder="例：coachtech1106">
            @error('password')
    <p class="error">{{ $message }}</p>
  @enderror
 </div>

        <button type="submit">登録</button>
    </form>
  </div>
@endsection