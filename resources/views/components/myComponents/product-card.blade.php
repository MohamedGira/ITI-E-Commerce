@props(['product'])
<a href="">
    <div class="card w-80 aspect-square bg-gray-100">
        @if (null !=
                $product->images()->where('name', 'banner')->first())
            <img class="border-[16px] border-white h-56  object-cover"
                src="/Images/{{ $product->images()->where('name', 'banner')->first()->name_on_disk }}"
                alt="??">
        @else
            <img class="border-[16px] border-white h-56  object-cover"
                src="https://www.eclosio.ong/wp-content/uploads/2018/08/default.png"
                alt="??">
        @endif
        <h1 class="text-gray-500 text-lg font-serif font-thin">
            {{ $product->name }}</h1>
        <p class="text-sm text-gray-400">{{ $product->brand }}</p>
        <p class="text-sm text-gray-500">${{ $product->price }}</p>
    </div>
</a>