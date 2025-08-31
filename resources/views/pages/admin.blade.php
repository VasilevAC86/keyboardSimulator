@extends('layouts/authed')
@section('title', 'Клавиатурный тренажёр')
@section('headline', 'Добро пожаловать в Клавиатурный тренажёр')

@section('div')
        <label>Вы зашли как </label>
        <label class="selected">{{ auth()->user()->name }}</label>  
        <label> с правами администратора</label>
        <br /><br />
        <label>Список доступных тем:</label>
        <br /><br />
        @foreach ($topics as $topic) 
            <div class="topic">
                {{ $topic->name }}
            </div>
        @endforeach     
        <br /><br />
        <a href="/add" class="btn">Добавить новую тему для тестирования</a>     
        <br /><br />
        <a href="/logout" class="btn">На главную страницу / Выйти</a>
@endsection