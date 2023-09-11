@props(['items'])
<x-app-layout>
    <div class="mt-36 mb-4 mx-auto w-10/12">
        <div class="relative overflow-x-auto flex flex-col gap-1 ">
            <a class=" self-end bg-green-700 hover:bg-green-800 text-white font-semibold py-1 px-4 rounded transition duration-200 transition-all"
                href="{{ route('category.create') }}">Add Category</a>
            <x-myComponents.categories-table :items="$items" />
        </div>
    </div>

</x-app-layout>
