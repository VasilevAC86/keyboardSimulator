@extends('layouts/auth')
@section('title', 'ВХОД в Клавиатурный тренажёр')
@section('headline', 'Войти в Клавиатурный тренажёр')

@section('form')
    <form id="login-form" action="/login" method="post"> <!--Форма для входа-->
            @csrf
            <label class="label">
                <input type="name" name="name" value="{{ old('name') }}" />                
                <span>Имя (ник)</span>
                @error('name')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="label">
                <input type="password" name="password" />
                <span>Пароль</span>                
                @error('password')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <button class="btn">Вход</button>
            <br />
            <a href="/reg" class="btn">Зарегистрироваться</a>
            <br />
            <a href="/logout" class="btn">На главную страницу</a>
     </form>
@endsection