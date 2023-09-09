@props(['items','name','checked'])
<div class="flex flex-wrap gap-2 text-lg">
    @foreach ($items as $item)
    @php
    $checkedArr=$checked->pluck('category_id')->toArray()    
    @endphp
    @if(in_array($item->id,$checkedArr))
    <x-form.checkbox-input name="{{$name}}" label="{{$item->name}}" value="{{$item->id}}" :checked="true"/>    
    @else
    <x-form.checkbox-input name="{{$name}}" label="{{$item->name}}" value="{{$item->id}}" />    
    @endif
    @endforeach
</div>