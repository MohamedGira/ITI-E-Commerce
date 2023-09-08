<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/app.css">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <header class="flex justify-between px-10 py-5">
        <a href="{{route('home')}}"><h1 class="font-black text-3xl">Simple</h1></a>
        <a href="mailto:mohamedgira0901@gmail.com">Contant us</a>
    </header>
    {{ $slot }}
    <script src="{{ asset('/scripts/notify.js') }}"></script>

</body>

</html>
