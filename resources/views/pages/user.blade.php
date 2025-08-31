@extends('layouts/authed')
@section('title', 'Клавиатурный тренажёр')
@section('headline', 'Добро пожаловать в Клавиатурный тренажёр')

@section('div')
        <label>Вы зашли как пользователь под ником</label>
        <label class="selected">{{ auth()->user()->name }}</label>
        <br /><br />
        <label>Список доступных тем:</label>
        <br /><br />            
        <select name="chose_topic" aria-placeholder="Выберите тему для тестирования" class="input">
            <option value="" disabled selected hidden>Пожалуйста, выберите тему для тестирования</option> <!--placeholder для элемента select-->
            @foreach ($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
            @endforeach
        </select>        
        <br /><br />
        <a href="/logout" class="btn">На главную страницу / Выйти</a>
@endsection