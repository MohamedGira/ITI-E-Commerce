@props(['product','class'])
@if (null !=
        $product->images()->where('name', 'banner')->first())
    <img class="{{$class}}"
        src="{{ $product->images()->where('name', 'banner')->first()->name_on_disk }}" alt="??">
@else
    <img class="{{$class}}"
        src="https://www.eclosio.ong/wp-content/uploads/2018/08/default.png" alt="??">
@endif
