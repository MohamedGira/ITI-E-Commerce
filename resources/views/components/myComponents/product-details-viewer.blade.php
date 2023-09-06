@props(['product'])
<div class="flex flex-col gap-3 w-1/2">
    <p class="text-orange-400 uppercase">{{$product->brand}}</p>
    <h1 class="font-black text-4xl">{{$product->name}}</h1>
    <p>{{$product->description}}</p>
    <div>
        @if($product->discount > 0)
        <p class="font-black text-2xl">
            <span>${{$product->price}}</span>
            <span
                class="bg-orange-100 text-orange-400 rounded-md font-normal text-sm px-1">{{$product->discount}}%</span></p>
        <p class="line-through text-grey-300 text-sm">${{$product->original_price}}</p>
        @else
        <p class="font-black text-2xl">${{$product->price}}</p>
        @endif
    </div>

    <div class="flex w-full gap-2">
        {{-- <div class="flex justify-between w-5/12 rounded-md bg-gray-100 px-2 py-2">
            <button id="less"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full w-5  aspect-square">-</button>
            <span id="count" class="font-black">1</span>
            <button
                id="more"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full w-5  aspect-square">+</button>
        </div> --}}
        <form id='addToCartForm'>
            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
            <button type="submit" id="addToCartBtn" class="p-2 text-xl transition-colors bg-orange-400 w-full text-center text-white rounded-md
            hover:bg-white hover:text-orange-400"><i class='bx bxs-cart-alt'></i> Add to cart
        </form>
        </button>
    </div>
</div>