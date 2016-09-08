<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ elixir('assets/css/app.css') }}">
</head>
<body>
    @include('navbar')

    @yield('content')

    <script src="{{ elixir('assets/js/app.js') }}"></script>
</body>
</html>