@props(['product'])
<li class="flex items-center gap-4 w-full" id="{{ $product->id }}_item">
    <x-myComponents.product-banner :product="$product" :class="'w-56 object-contain aspect-square items-center rounded-md'" />
    <div class="grid grid-cols-4  gap-2 justify-between w-full items-center">
        <div class="max-w-[200px]">
            <h1 class="text-2xl">{{ $product->name }}</h1>
            <p class="text-gray-400">{{ $product->brand }}</p>
        </div>
        <div class="flex justify-evenly rounded-md bg-gray-100  py-2 items-center max-w-[100px]">
            <button id="less" onclick="decrease(`{{ $product->id }}`)" type="button"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full text-lg aspect-square">
                &ndash;</button>
            <input id="{{ $product->id }}" type="number" value="1" class=" text-right w-10 quantity"
                min="1" disabled>
            <button id="more" onclick="increase(`{{ $product->id }}`)" type="button"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full text-xl aspect-square">&#65291;</button>
        </div>
        <div class="price">
            ${{ number_format($product->price, 2, '.', ',') }}
        </div>
        <i class='bx bx-trash text-4xl cursor-pointer' onclick="removeItem(`{{$product->id}}`)" ></i>
    </div>
</li>
