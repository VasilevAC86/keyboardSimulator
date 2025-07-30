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
        <h3>
            {{ auth() -> user() -> email}} 
            <label>Вы зашли с правами администратора!</label>
            <a href="/logout">Выйти</a>
        </h3>
    @else
        <h3>Вы не авторизованы!</h3>
    @endauth
</body>
</html>