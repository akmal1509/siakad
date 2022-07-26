<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
</head>

<body>
    <div class="w-full max-w-4xl mx-auto px-3">
        @include('layouts.home.nav')
        @yield('content-1')
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    @stack('scripts')
</body>

</html>
