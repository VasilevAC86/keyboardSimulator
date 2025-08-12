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
            <br /><br />
            <label>Вы зашли с правами администратора!</label>            
        </h3>       
        <div class="container">
            <form id="chose-file" action="/chose-file" method="post" enctype="multipart/form-data"> <!--Форма для входа, action - адрес, куда будет отправлен запрос-->
                @csrf <!--у формы доб. скрытое поле с случайным значением, чтобы пользователь не отправил скрытый запрос в БД, для безопастности-->
                <label class="label">Выбрать текстовый файл для теста:</label>
                <input type="file" name="fileToUpload" id="fileToUpload"> <!--Выбор файла с компьютера-->
                
                <br /><br />
                <label class="label">Название теста:</label>                
                <div class="box">
                    <?php 
                        //$_FILES["fileToUpload"]["name"];
                    ?>
                </div>
                <br />
                <label class="label">Содержание теста:</label>
                <div class="box">333</div>
                <br /><br />
                <button>Занести выбранный файл в базу данных тестов</button>
                <br /><br />
                <a href="/logout">Выйти</a>
            </form>
        </div>       
        
    @else
        <h3>Вы не авторизованы!</h3>
    @endauth
</body>
</html>