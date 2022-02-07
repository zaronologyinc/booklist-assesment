<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="antialiased">
  <header class='fixed top-0 left-0 w-full bg-sky-500/20'>
  </header>
    <div class='grid'>
        <h1 class='text-white text-3xl block mx-auto font-bold'>@yield('header')</h1>
        @yield('content')
    </div>
    <footer>
        <script type='text/javascript' src='{{ asset('js/app.js') }}'></script>
    </footer>
</body>

</html>
