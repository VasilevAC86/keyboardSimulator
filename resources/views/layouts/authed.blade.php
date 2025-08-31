<!--Макет страницы после успешной авторизации-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite([
        'resources/css/authed.css',
        'resources/css/var.css'
        ])
</head>
<body>
    <h2 class="headline">@yield('headline')</h2>
    <div class="container">
        @yield('div')
    </div>
</body>
</html>