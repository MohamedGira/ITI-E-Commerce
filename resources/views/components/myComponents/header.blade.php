@if (Auth::user()?->role == 'admin')
    <header class="flex justify-between  px-40 py-8 border-b-2 pb-8 fixed w-100 top-0 left-0 right-0 bg-white z-50">
        <ul class="flex gap-12 items-center">
            <li>
                <a href="{{ route('home') }}">
                    <h1 class="font-black text-3xl">Simple</h1>
                </a>
            </li>
            <a href="{{ route('admin.products') }}">
                <li>Products</li>
            </a>
            <a href="{{ route('admin.categories') }}">
                <li>Categories</li>
            </a>
            <a href="{{ route('profile.edit') }}">
                <li>Profile</li>
            </a>
        </ul>
        <form class="w-auto p-0" action="{{ route('admin.results') }}">
            <input type="text" placeholder="Search..." class="focus:outline-orange-700 w-full p-1" name="query">
        </form>
        <div class="flex gap-2 items-center">
            <a href="{{ route('profile.edit') }}">
                <img class="object-cover rounded-full w-10 h-10"
                    src="{{ Auth::user()?->customer->profile_image ?? '/Images/default.jpg' }}" alt='profile'>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="underline text-sm text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Logout
                </button>
            </form>

        </div>

    </header>
@else
    <header class="flex justify-between  px-40 py-8 border-b-2 pb-8 fixed w-100 top-0 left-0 right-0 bg-white ">
        <ul class="flex gap-12 items-center">
            <li>
                <a href="{{ route('home') }}">
                    <h1 class="font-black text-3xl">Simple</h1>
                </a>
            </li>
            <a href="{{ route('home') }}">
                <li>Home</li>
            </a>
            {{--             <a href="">
                <li>Orders</li>
            </a> --}}
            @if (Auth::user())
                <a href="{{ route('profile.edit') }}">
                    <li>Profile</li>
                </a>
            @endif
        </ul>
        <form class="w-auto p-0" action="{{ route('results') }}">
            <input type="text" placeholder="Search..." class="focus:outline-orange-700 w-full p-1" name="query">
        </form>
        <div class="flex gap-2 items-end">
            <div class="flex gap-4 ite">
                <a class="w-7 self-center aspect-square" href="{{ route('cart') }}"><img
                        src="/assets/icon-cart.svg"></a>
                @if (Auth::user())
                    <a href="{{ route('profile.edit') }}">
                        <img class="object-cover rounded-full w-10 h-10"
                            src="{{ Auth::user()?->customer->profile_image ?? '/Images/default.jpg' }}" alt='profile'>
                    </a>
                @endif
                @if (Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                @endif
            </div>

        </div>
    </header>
@endif
