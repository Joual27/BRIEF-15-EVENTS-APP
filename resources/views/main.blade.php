<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
    <body>
        <div>
            @yield('content')
        </div>
    </body>
</html>
