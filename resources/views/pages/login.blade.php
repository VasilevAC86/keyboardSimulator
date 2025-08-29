<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клавиатурный тренажёр</title>

    @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js']) <!--Подключаем файлы-->
</head>
<body>
    <div class="container">
        <form id="login-form" action="/login" method="post"> <!--Форма для входа-->
            @csrf
            <label class="label">
                <input type="name" name="name" value="{{ old('name') }}" />                
                <span>Имя (ник)</span>
                @error('name')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="label">
                <input type="password" name="password" />
                <span>Пароль</span>                
                @error('password')
                <div class="err-msg">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <button>Вход</button>
            <a href="/reg">Зарегистрироваться</a>
        </form>
    </div>
</body>
</html>