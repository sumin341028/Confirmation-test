@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
<style>
    .header {
        display: none;
    }
</style>
@endsection

@section('content')
<main class="thanks-container">
    <div class="thanks-wrapper">
        <h1 class="thanks-message">お問い合わせありがとうございました</h1>
        <p class="thanks-bg-text">Thank you</p>
        <a href="{{ route('contacts.index') }}" class="btn-home">HOME</a>
    </div>
</main>
@endsection