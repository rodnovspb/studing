@include('parts.head')

@section('sticky')
    для внутренних
@show

@include('parts.header')

@yield('content')

@include('parts.footer')
