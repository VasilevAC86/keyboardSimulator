<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление новой темы для тестирования</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) <!--Подключаем файлы-->
</head>
<body>
    <div class="container">                
        <label>Вы зашли, как </label>
        <label class="selected">{{ auth()->user()->name }}</label>        
        <form id="chose-file" action="/add" method="post" enctype="multipart/form-data"> <!--Форма для входа, action - адрес, куда будет отправлен запрос-->
            @csrf <!--у формы доб. скрытое поле с случайным значением, чтобы пользователь не отправил скрытый запрос в БД, для безопастности-->
            <label>Выбрать текстовый файл для теста:</label>
            <input type="file" name="fileToUpload" id="fileToUpload"> <!--Выбор файла с компьютера-->                        
            <br /><br />
            <button>Ok</button>              
        </form>        
        <br /><br />
        <a href="/logout">Выйти</a>
    </div>       
</body>
</html>