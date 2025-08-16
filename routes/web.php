<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

Route::get('/', [AuthController::class, 'loginPage']);
Route::redirect('/login', '/')->name('login'); # когда кто-то пытается зайти на стр. Login, мы перенаправляем его на гл.стр.

Route::get('/reg', [AuthController::class, 'regPage']); 

Route::post('/reg', [AuthController::class, 'register']); # при action, ссылающемся на /reg, вызывается ф. register
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']); # метод post, чтобы разлогиниться по ссылке

Route::group(['middleware' => ['auth']], function(){ # защищённая группа маршрутов, защищённая middleware (проверка авторизации пользователя)
    Route::get('/lenta', [MainController::class, 'lentaPage']); # маршрут для пользователей в статусе user
    Route::get('/admin', [MainController::class,'adminPage']); # маршрут для администраторов
    Route::get('/add', [MainController::class,'addPage']); # маршрут страницы с добавлением новой темы для тестирования (для администраторов)
    Route::post('/add', [MainController::class,'addTopic']); # при action, ссылающемся на /add, вызывается ф. addTopic, добавляющая текстовый файл в БД Topics
    Route::get('/admin',[MainController::class,'getTopics']); # вывод всех тем из БД для админа
    Route::get('/lenta', [MainController::class,'getTopics']); # вывод всех доступных тем из БД для пользователя
});