<html>
<head>
    <title>Play</title>
</head>
<body>

    @if(Auth::check())
        <div>
            {{ $unread }} unread messages
        </div>
    @endif

    @yield('content')
</body>
</html>