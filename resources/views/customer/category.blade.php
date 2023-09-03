<x-app-layout>
    <main class="flex flex-col w-full mt-36 gap-12">
        <h1 class="uppercase text-center text-xl text-orange-700 kumbh">{{ $item->name }}</h1>
        <div class="p-10 bg-gray-100">
            @if (count($item->subCategories))
                <h2 class="text-2xl text-gray-500 mb-1">Sub Categories</h2>
                <ul class="flex flex-start gap-12 menu ">
                    @foreach ($item->subCategories as $category)
                        <li>
                            <x-myComponents.category-card :category="$category" />
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-12">
                <h2 class="text-2xl text-gray-500 mb-1">Products</h2>
                <ul class="flex flex-start gap-12 menu ">
                    @foreach ([$item, ...$item->subCategories] as $category)
                        @foreach ($category->productsCategories as $productCategory)
                            <li>
                                <x-myComponents.product-card :product="$productCategory->product" />
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>

    </main>

</x-app-layout>
