<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="{{ URL::to('css/app.css') }}" rel="stylesheet">
    @yield('title')
</head>
<body>
@include('partials.navigation')
@yield('content')
</body>
</html>
