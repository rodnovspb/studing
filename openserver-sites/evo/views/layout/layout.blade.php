<!DOCTYPE html>
<html lang="ru">

@include('parts.head')

<body>
    @include('parts.search')

    @yield('content')

   @include('parts.newsarea')
   @include('parts.footer')
   @include('parts.footer_scripts')

</body>

</html>
