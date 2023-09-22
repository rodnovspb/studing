<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="{{ $documentObject['metakeywords'] }}" />
<meta name="description" content="{{ $documentObject['description'] }}" />
<base href="{{ $modx->getConfig('site_url') }}">
<title>{{ $documentObject['pagetitle'] }}</title>

</head>
<body>

@yield('content')















</body>
</html>
