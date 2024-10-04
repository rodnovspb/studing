<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<title>Документ</title>
</head>
<body>
<div class="wrapper">
   @include('parts.header')

    <main>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
</div>


















</body>
</html>
