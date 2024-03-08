<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
    <body class="overflow-x-hidden">
        <div>
            @yield('content')
        </div>
    </body>
</html>
