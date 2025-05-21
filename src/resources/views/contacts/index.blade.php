@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<main class="form-container">
    <h2 class="form-title">Contact</h2>

    <form method="POST" action="{{ route('confirm') }}">
        @csrf

        <!-- お名前 -->
        <div class="form-group">
            <label>お名前 <span class="required">※</span></label>
            <div class="form-input">
                <div class="input-pair">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                </div>
                <div class="error-block">
                    @error('last_name')<p class="error-message">{{ $message }}</p>@enderror
                    @error('first_name')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="form-group">
            <label>性別 <span class="required">※</span></label>
            <div class="form-input">
                <div class="radio-group">
                    <label><input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}> 男性</label>
                    <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}> 女性</label>
                    <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}> その他</label>
                </div>
                <div class="error-block">
                    @error('gender')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form-group">
            <label>メールアドレス <span class="required">※</span></label>
            <div class="form-input">
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                <div class="error-block">
                    @error('email')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
            <label>電話番号 <span class="required">※</span></label>
            <div class="form-input">
                <div class="tel-input-group">
                    <input type="text" name="tel1" value="{{ old('tel1') }}" placeholder="例：080">
                    <span>-</span>
                    <input type="text" name="tel2" value="{{ old('tel2') }}" placeholder="例：1234">
                    <span>-</span>
                    <input type="text" name="tel3" value="{{ old('tel3') }}" placeholder="例：5678">
                </div>
                <div class="error-block">
                    @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                        <p class="error-message">電話番号を入力してください</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- 住所 -->
        <div class="form-group">
            <label>住所 <span class="required">※</span></label>
            <div class="form-input">
                <input type="text" name="address" placeholder="例：東京都渋谷区千代ヶ谷2-3" value="{{ old('address') }}">
                <div class="error-block">
                    @error('address')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form-group">
            <label>建物名（任意）</label>
            <div class="form-input">
                <input type="text" name="building" placeholder="例：千代ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>

        <!-- お問い合わせの種類 -->
        <div class="form-group">
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <div class="form-input">
                <select name="category_id">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
                <div class="error-block">
                    @error('category_id')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <div class="form-input">
                <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                <div class="error-block">
                    @error('detail')<p class="error-message">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="form-group center">
            <button type="submit" class="submit-btn">確認画面</button>
        </div>
    </form>
</main>
@endsection
