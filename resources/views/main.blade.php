<html>
<head>
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
    <body>
        <div>
            @yield('content')
        </div>
    </body>
</html>
