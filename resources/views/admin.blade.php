<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница администратора</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) <!--Подключаем файлы-->
</head>
<body>
    @auth <!--Работрает как if-->
    <div class="container">
        <label>Вы зашли, как </label>
        <label class="selected">{{ auth()->user()->name }}</label>  
        <label>, с правами администратора</label>
        <br /><br />
        <label>Список доступных тем:</label>
        <br /><br />
        @foreach ($topics as $topic)
            <div class="topic">
                {{ $topic->name }}
            </div>
        @endforeach        
        <br /><br />
        <a href="/add">Добавить новую тему для тестирования</a>     
        <br /><br />
        <a href="/logout">Выйти</a>
    </div>         
    @else
        <h3>Вы не авторизованы!</h3>
    @endauth

</body>
</html>
