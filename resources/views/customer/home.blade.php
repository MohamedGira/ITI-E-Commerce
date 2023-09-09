<x-app-layout>
    <main class="flex flex-col w-full h-full mt-36 gap-12">
        <h1 class="uppercase text-center text-xl text-orange-700 kumbh">Categories</h1>
        <div class="p-10 bg-gray-100 flex-initial">
            <ul class="flex flex-start gap-12 flex-wrap ">
                @forelse($items as $category)
                    <li>
                       <x-myComponents.category-card :category="$category" />
                    </li>
                @empty
                    <h1 class="text-5xl self-center w-screen text-center text-gray-500">No Categories Available</h1>
                @endforelse
            </ul>
        </div>
    </main>

</x-app-layout>
