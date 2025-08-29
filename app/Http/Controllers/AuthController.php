<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; # Подключение класса Auth с методами для авторизации пользователя
use App\Models\User; # Подключаем класс User для использования его ф.

class AuthController extends Controller
{
    public function loginPage(){
        return view("pages/login");
    }
    public function regPage(){
        return view("pages/reg");
    }

    public function register(Request $request){ # Request - это объект запроса
        $validated = $request->validate([ # validate - спец. ф. класса Auth для проверки данных, введённых пользователем
            "name" => "required|max:255", # поле name обязательно для заполнения (статья "Валидация" на laravel.su)
            "email" => "required|email|unique:users,email|max:255", # проверка не только на длину строки, но и на соответв. эл.адресу и на уникальнасть в табл. users в колонке email
            "password" => "required|confirmed", # проверка подтверждения пароля
        ]);
        User::create($validated);
        return redirect("/"); # возврат на страницу login
    }
    public function login(Request $request){ # ф. для авторизации пользователя (трубуется имя и пароль)
        $credentials = $request->validate([            
            "name" => "required",
            "password" => "required" # чтобы поле было просто заполнено
        ]);
        if(Auth::attempt($credentials)){ # attempt пробует авторизовать пользователя
            $user = Auth::user(); # в переменную user записываем данные из БД
            $request->session()->regenerate(); # чтобы пользователю сохранить ключ сессии в браузере
            if ($user['status'] == 'admin') { # если пользователь зашёл под статусом admin, то направляем его на стр. admin
                return redirect("/admin");
            }            
            return redirect("/user"); # отправляем пользователя на закрытыю middleware стр. user
        }
        return back()->withErrors(["email" => "Учётные данные не верны!"]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); # забираем пользовательскую сессию
        $request->session()->regenerateToken(); # обновляем токен, чтобы он был недействительным
        return redirect("/");
    }    
}