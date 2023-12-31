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
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/assets/app.css">
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{--     @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="h-full">
    <x-myComponents.header  />
    <!-- Page Content -->
    <script src="{{ asset('/scripts/notify.js') }}"></script>
    <script src="{{ asset('/scripts/notifyGlob.js') }}"></script>
    {{ $slot }}
    </div>
</body>

</html>
