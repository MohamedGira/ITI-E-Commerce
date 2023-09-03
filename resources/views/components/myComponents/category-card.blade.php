@props(['category'])
<a href="{{ route('category.details', $category->id) }}">
    <div class="card w-80 bg-gray-100">
        <img class="border-[16px] border-white h-56  object-cover"
            src="/Images/{{ $category->images[0]->name_on_disk }}" alt="??">
        <h1 class="text-gray-500 text-lg kumbh ">{{ $category->name }}</h1>
        <p class="text-sm text-gray-400 kumbh">
            @foreach ($category->subCategories as $child)
                {{ $child->name }}
                @if (!$loop->last)
                    |
                @endif
            @endforeach
        </p>
    </div>
</a>