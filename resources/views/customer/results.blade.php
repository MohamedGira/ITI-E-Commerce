<x-app-layout>
    <main class="flex flex-col w-full mt-36 gap-12">
        <h1 class="uppercase text-center text-xl text-orange-700 kumbh">Search results for: {{ $query }}</h1>
        <div class="p-10 bg-gray-100">
            @if (count($categories) > 0)
                <h2 class="text-2xl text-gray-500 mb-1">Categories</h2>
                <ul class="flex flex-start gap-12 menu ">
                    @foreach ($categories as $category)
                        <li>
                            <x-myComponents.category-card :category="$category" />
                        </li>
                    @endforeach
                </ul>
            @endif
            @if (count($products) > 0)
                <div class="mt-12">
                    <h2 class="text-2xl text-gray-500 mb-1">Products</h2>
                    <ul class="flex flex-start gap-12 flex-wrap ">
                        @foreach ($products as $product)
                            <li>
                                <x-myComponents.product-card :product="$product" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (count($categories) + count($products) == 0)
                <h1 class="text-5xl self-center w-screen text-center text-gray-500">No Results Found</h1>
            @endif
        </div>

    </main>

</x-app-layout>
