@extends('layouts/authed')
@section('title', 'Клавиатурный тренажёр')
@section('headline', 'Удаление темы тестирования в Клавиатурном тренажёре')

@section('div')
        <label>Вы зашли как </label>
        <label class="selected">{{ auth()->user()->name }}</label> 
        <label> с правами администратора</label> 
        <br /><br />   
        <form action="/delete" method="post" enctype="multipart/form-data">
            @csrf
            <select name="chose_topic" aria-placeholder="Выберите тему для тестирования" class="input">
                <option value="" disabled selected hidden>Пожалуйста, выберите тему </option> <!--placeholder для элемента select-->
                @foreach ($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach            
            </select>          
            <br /><br /><br />
            <button class="btn">Удалить</button>
        </form>          
        <br /><br />
        <a href="/logout" class="btn">На главную страницу / Выйти</a>
@endsection