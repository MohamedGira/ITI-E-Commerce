@props(['category'])
<a href="{{ route('category.details', $category->id) }}">
    <div class="card w-80 bg-gray-100">
        @if(count($category->images))
        <img class="border-[16px] border-white h-56  object-cover min-w-[320px] hover:scale-[1.01] hover:-translate-y-2  duration-400 transition-all"
            src="{{ $category->images[0]->name_on_disk }}" alt="??">
        @else
        <img class="border-[16px] border-white h-56  object-cover min-w-[320px] hover:scale-[1.01] hover:-translate-y-2  duration-400 transition-all"
            src="/Images/default.png" alt="??">
        @endif
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