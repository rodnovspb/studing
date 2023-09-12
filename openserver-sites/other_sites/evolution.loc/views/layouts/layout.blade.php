<!DOCTYPE HTML>

<html>

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="/template/css/main.min.css" />
<base href="{{ $modx->getConfig('site_url') }}" />
<title>{{ $documentObject['metatitle'] ?: $documentObject['pagetitle'] }}</title>
<meta name="description" content="{{ $documentObject['metadescription'] ?: $documentObject['introtext'] }}"/>
{!! $modx->getConfig('client_header_codes') !!}
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

@include('parts.header')
        <!-- -->
        <!-- Menu -->
@include('parts.menu')


        <!-- Main -->
        <main id="main">

            @yield('content')
        </main>

        <!-- Sidebar -->
    @include('parts.sidebar')


    </div>

    <script src="/template/js/all.min.js"></script>
    {!! $modx->getConfig('client_footer_codes') !!}

</body>

</html>
