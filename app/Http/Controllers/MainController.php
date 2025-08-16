<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; # Подключение класса Auth с методами для авторизации пользователя
use App\Models\Topic; # Подключаем модель для отправки запросов в БД

class MainController extends Controller
{
    public function lentaPage(){
        return view("lenta");
    }
    public function adminPage(){
        return view("admin");
    }
    public function addPage(){
        return view("add");
    }
    public function addTopic(Request $request){
        $validated = $request->validate([
            'fileToUpload' => 'required',
        ]);
        $file = $request->file('fileToUpload'); # объект, в котором содержатся данные о файле из input с именем fileToUpload
        $user = Auth::user(); # объект, в котором содержатся данные о пользователе
        Topic::create([
            'name' => $file->getClientOriginalName(),
            'text'=> $file->getContent(),
            'admin_id'=> $user->id,
            'admin_name' => $user->name,            
        ]);
        $file->storePubliclyAs('uploads', $file->getClientOriginalName(), 'public');
        return redirect('/admin');
    }
    public function getTopics(){
        $user = Auth::user(); # объект, в котором содержатся данные о пользователе        
        $topics = Topic::all(); # переменная-объект, хранящая данные всех тем вместе с данными о пользователях
        if($user->status == 'admin'){
            return view('/admin', ['topics' => $topics]); // ответ с темами для админа
        }
        return view('/lenta', ['topics'=> $topics]); // ответ с темами для пользователя
    }
}
