@props(['products','categories'])
<x-app-layout>
    <div class="mt-36 mb-4 mx-auto w-10/12">
        <h1 class="uppercase text-center text-xl text-orange-700 kumbh">Search results for: {{ $query }}</h1>

        <div class="relative overflow-x-auto">
            <h1 class="text-3xl font-bold text-left">Resutls in Categories</h1>
            @if(count($categories)>0)
            <x-myComponents.categories-table :items="$categories" />
            @else
            <h1 class="text-3xl text-gray-400 py-36 bg-gray-100 text-center">No results in categories</h1>
            @endif
            <h1 class="text-3xl font-bold text-left mt-3">Resutls in Products</h1>
            @if(count($products)>0)
            <x-myComponents.products-table :items="$products" />
            @else
            <h1 class="text-3xl text-gray-400 py-36 bg-gray-100 text-center">No results in products</h1>
            @endif

        </div>
    </div>

</x-app-layout>
