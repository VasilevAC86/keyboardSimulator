@extends('layouts/auth')
@section('title', 'РЕГИСТРАЦИЯ в Клавиатурном тренажёре')
@section('headline', 'Зарегистрируйтесь в Клавиатурном тренажёре')

@section('form')   
    <form id="login-form" action="/reg" method="post" > <!--Форма для входа, action - адрес, куда будет отправлен запрос-->
        @csrf <!--у формы доб. скрытое поле с случайным значением, чтобы пользователь не отправил скрытый запрос в БД, для безопастности-->
            <label class="label">
                <input type="text" name="name" value="{{ old('name')}}" /> <!--value для сохранения старого ввода-->
                <span>Имя пользователя</span>
                @error('name') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="label">
                <input type="email" name="email" value="{{ old('email')}}">
                <span>E-mail</span>
                @error('email') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="label">
                <input type="password" name="password" />
                <span>Пароль</span> 
                @error('password') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror               
            </label>
            <label class="label">
                <input type="password" name="password_confirmation" />
                <span>Повтор пароля</span>                
                @error('password_confirmation') <!--если ошибка при заполнении формы, то будет выводится div класса err-msg-->
                    <div class="err-msg">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <button class="btn">Зарегистрироваться</button>
            <br />
            <a href="/logout" class="btn">На главную страницу</a>
     </form>     
@endsection