<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; # Подключение класса Auth с методами для авторизации пользователя
use App\Models\Topic; # Подключаем модель для отправки запросов в БД
use Storage;

class MainController extends Controller
{
    public function welcomePage(){
        return view("pages/welcome");
    }
    public function userPage(){
        return view("pages/user");
    }
    public function adminPage(){
        return view("pages/admin");
    }
    public function addPage(){
        return view("pages/add");
    }
    public function deletePage(){
        return view("pages/delete");
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
    public function deleteTopic(Request $request){
        $topicid = $request->input('chose_topic');          
        $topic = Topic::find($topicid);    
        Storage::delete('/storage/app/public/uploads/'.$topic->name);
        $topic->delete();

        return redirect('/delete');
    }
    public function getTopics(){
        $user = Auth::user(); # объект, в котором содержатся данные о пользователе        
        $topics = Topic::all(); # переменная-объект, хранящая данные всех тем вместе с данными о пользователях       
        if($user->status == 'admin'){
            return view('pages/admin', ['topics' => $topics]); // ответ с темами для админа
        }
        return view('pages/user', ['topics'=> $topics]); // ответ с темами для пользователя
    }
    public function getTopicsChange(){
        $user = Auth::user(); # объект, в котором содержатся данные о пользователе        
        $topics = Topic::all(); # переменная-объект, хранящая данные всех тем вместе с данными о пользователях       
        if($user->status == 'admin'){
            return view('pages/delete', ['topics' => $topics]); // ответ с темами для админа
        }
        return view('/'); // ответ с темами для пользователя
    }
}
