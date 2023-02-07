@include('parts.head')

@include('parts.sticky')

@include('parts.header')

@yield('sticky-inner', null)

@yield('content')

@include('parts.footer')
