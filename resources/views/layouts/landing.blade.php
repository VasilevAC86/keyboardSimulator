<!--Макет для главной страницы-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>@yield('title')</title> <!--Объявляем секцию, внутрь которой можно что-нибудь подставить-->
    <!--Подключаем ресуры-->
    @vite([ 
        'resources/css/landing.css',
        'resources/css/var.css'
        ]) 
</head>
<body>
    <h2 class="greeting">Добро пожаловать в Клавиатурный тренажёр</h2>
    <div class="description">
        @yield('description') <!--Объявляем секцию-->
    </div>
</body>
</html>