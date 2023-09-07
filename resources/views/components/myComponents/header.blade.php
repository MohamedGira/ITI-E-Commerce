<header class="flex justify-between  px-40 py-8 border-b-2 pb-8 fixed w-100 top-0 left-0 right-0 bg-white ">
    <ul class="flex gap-12 items-center">
        <li>
            <a href="{{route('home')}}"><h1 class="font-black text-3xl">Simple</h1></a>
        </li>
        <a href="{{route('home')}}"><li>Home</li></a>
        <a href=""><li>Orders</li></a>
        <a href="{{route('profile.edit')}}"><li>Profile</li></a>
    </ul>
    <form  class="w-5/12 p-0" action="{{route('results')}}">
        <input type="text" placeholder="Search..." class="focus:outline-orange-700 w-full p-1" name="query">
    </form>
    <div class="flex gap-4">
        <a href="{{route('cart')}}"><img class="w-10" src="/assets/icon-cart.svg"></a>
{{--             <img class="rounded-full w-10 h-10" src="Images/{{$userData?->profile_image||'default.jpg'}}">
--}}        </div>
</header>