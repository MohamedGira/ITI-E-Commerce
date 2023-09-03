@props(['userData'])
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
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{--     @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <header class="flex justify-between  px-40 py-8 border-b-2 pb-8 fixed w-100 top-0 left-0 right-0 bg-white ">
        <ul class="flex gap-12 items-center">
            <li>
                <h1 class="font-black text-3xl">Simple</h1>
            </li>
            <a href=""><li>Products</li></a>
            <a href=""><li>Orders</li></a>
            <a href="{{route('profile.edit')}}"><li>Profile</li></a>
        </ul>
        <div class="flex gap-4">
            <img class="w-10" src="/assets/icon-cart.svg">
{{--             <img class="rounded-full w-10 h-10" src="Images/{{$userData?->profile_image||'default.jpg'}}">
 --}}        </div>
    </header>
    <!-- Page Content -->
    {{ $slot }}
    </div>
</body>

</html>
