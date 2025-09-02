@extends('layouts/authed')
@section('title', 'Клавиатурный тренажёр')
@section('headline', 'Добавление новой темы для тестирования в Клавиатурный тренажёр')

@section('div')
        <label>Вы зашли как </label>
        <label class="selected">{{ auth()->user()->name }}</label> 
        <br /><br />
        <form id="chose-file" action="/add" method="post" enctype="multipart/form-data"> <!--Форма для входа, action - адрес, куда будет отправлен запрос-->
            @csrf <!--у формы доб. скрытое поле с случайным значением, чтобы пользователь не отправил скрытый запрос в БД, для безопастности-->            
            <label>Выбрать текстовый файл для теста:</label>
            <br /><br />
            <input type="file" name="fileToUpload" id="fileToUpload"> <!--Выбор файла с компьютера-->                        
            <br /><br />
            <button class="btn">Ok</button>              
        </form>        
        <br /><br />
        <a href="/logout" class="btn">На главную страницу / Выйти</a>
@endsection