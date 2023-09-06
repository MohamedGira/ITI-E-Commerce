@props(['product'])
<a href="{{ route('product.details', $product->id) }}">
    <div class="card w-80 aspect-square bg-gray-100">
        @if (null !=
                $product->images()->where('name', 'banner')->first())
            <img class="border-[16px] border-white h-56  object-cover min-w-[320px]"
                src="{{ $product->images()->where('name', 'banner')->first()->name_on_disk }}" alt="??">
        @else
            <img class="border-[16px] border-white h-56  object-cover min-w-[320px]"
                src="https://www.eclosio.ong/wp-content/uploads/2018/08/default.png" alt="??">
        @endif
        <h1 class="text-gray-500 text-lg font-serif font-thin">
            {{ $product->name }}</h1>
        <p class="text-sm text-gray-400">{{ $product->brand }}</p>
        @if ($product->discount == 0)
        <p class="font-black">${{$product->price}}</p>
        @else
        <div>
            <p class="font-black">${{$product->price}} <span class="bg-orange-100 text-orange-400 rounded-md font-normal text-sm px-1"> {{$product->discount}}%</span></p>
            <p class="line-through text-grey-300 text-sm">${{$product->original_price}}</p>
        @endif
    </div>
</a>
