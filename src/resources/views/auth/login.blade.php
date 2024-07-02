@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="main_head">
    <h2 class="small-tittle">ログイン画面</h2>
</div>
<form class="form" action="/login" method="post">
    @csrf
    <div class="form_main">
        <p>メールアドレス： <input type="email" name="email" size="40" placeholder="test@example.com" value="{{ old('email') }}" /></p>
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>

        <p>パスワード　　： <input type="password" name="password" size="40" placeholder="coachtech1106" value="{{ old('password') }}" /></p>
        <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
        </div>

        <div class="form_btn">
            <input type="submit" value="ログイン" />
        </div>
    </div>
</form>

@endsection