<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">
        <link rel="canonical" href="/login">
        <link rel="shortcut icon" type="image/jpg"
        href="https://i.imgur.com/UyXqJLi.png" />
        <title>{{ $title }}</title>
        <!-- CSS -->
        @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;5
        00;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="bg-gray-100 font-poppins min-h-screen" style="background: url('{{ asset('image/bonsai.jpg') }}') no-repeat center center fixed; background-size: cover;">
        <!-- content -->
        @yield('content')
    </body>
</html>