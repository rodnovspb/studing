@include('parts.header')

<body>

@include('parts.search')

@yield('content')

@include('parts.newsletter')
@include('parts.footer')
@include('parts.footer_scripts')
@stack('scripts')

</body>

</html>
