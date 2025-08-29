@extends('layouts/landing') <!--расширяем landing-->
@section('title', 'PhotoGramm БВ322')
@section('description')
    <p>Научитесь печатать вслепую и тренируйте свои навыки набора текста</p>
    <p>Это простой и удобный в использовании клавиатурный тренажер, который <br />
        поможет вам освоить навык печати десятью пальцами, повысить скорость набора текста 
        и уменьшить количество опечаток.</p>
    <div class="btn-container">
        <a href="/login" class="btn btn-white">Войти</a>
        <a href="/reg" class="btn btn-white">Регистрация</a>
    </div>
    
@endsection