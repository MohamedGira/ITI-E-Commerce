@props(['product'])
<!-- perview -->
<div class="w-1/2 flex items-center gap-2">
    <button id="prevBtn"
        class="text-gray-900 bg-white border border-gray-300 focus:outline-none  hover:bg-gray-100 rounded-full  w-12 p-2">&lt;</button>
    <div class="w-full flex flex-col gap-6">
        <div>
            @if (null !=
                    $product->images()->where('name', 'banner')->first())
                <img id="current-image"
                    class="rounded-xl w-full object-contain h-96 hover:scale-125  duration-400 transition-all"
                    src="{{ $product->images()->where('name', 'banner')->first()->name_on_disk }}" alt="">
            @else
                <img id="current-image" class="rounded-xl w-full" src="/Images/default.png" alt="">
            @endif
        </div>

        <div>
            @if (null != $product->images()->first())
                <ul id="images" class="flex  gap-2 justify-between menu">
                    @foreach ($product->images as $image)
                        <li class="min-w-[20%] w-1/5"><img class=" max-w-full rounded-md h-24  object-contain"
                                src="{{ $image->name_on_disk }}" alt="">
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <button type="button" id="nextBtn"
    class="text-gray-900 bg-white border border-gray-300 focus:outline-none  hover:bg-gray-100 rounded-full  w-12 p-2">
    &gt;
</button>

</div>

