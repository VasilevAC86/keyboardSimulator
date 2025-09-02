@extends('layouts/authed')
@section('title', 'Клавиатурный тренажёр')
@section('headline', 'Добро пожаловать в Клавиатурный тренажёр')

@section('div')
        <label>Вы зашли как </label>
        <label class="selected">{{ auth()->user()->name }}</label>  
        <label> с правами администратора</label>
        <br /><br />
        <h3>Список доступных тем:</h3>        
        @foreach ($topics as $topic) 
            <div class="topic">
                {{ $topic->name }}
            </div>
        @endforeach     
        <br /><br />
        <a href="/add" class="btn">Добавить новую тему для тестирования</a>     
        <br /><br /><br />
        <a href="/delete" class="btn">Удалить тему для тестирования</a>
        <br /><br /><br />
        <a href="/logout" class="btn">На главную страницу / Выйти</a>
@endsection