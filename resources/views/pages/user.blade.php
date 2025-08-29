<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лента</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) <!--Подключаем файлы-->
</head>
<body>
    @auth <!--Работрает как if-->
    <div class="container">
        <label>Вы зашли, как пользователь</label>
        <label class="selected">{{ auth()->user()->name }}</label>
        <br /><br />
        <label>Список доступных тем:</label>
        <br /><br />            
        <select name="chose_topic" aria-placeholder="Выберите тему для тестирования">
            <option value="" disabled selected hidden>Пожалуйста, выберите тему для тестирвания</option> <!--placeholder для элемента select-->
            @foreach ($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
            @endforeach
        </select>        
        <br /><br />
        <a href="/logout">Выйти</a>
    </div>
    @else
        <h3>Вы не авторизованы!</h3>
    @endauth

</body>
</html>