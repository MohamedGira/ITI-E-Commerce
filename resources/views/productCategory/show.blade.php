<div style="color:rgb(255, 133, 133)">
    {{ $errors }}
</div>

<div>
    show
    @isset($item)
    {{ $item }}
    {{ $item->image}}
    @endisset
    @isset($message)
    {{ $message }}
    @endisset
</div>
