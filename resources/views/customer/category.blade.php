<x-app-layout>
    <main class="flex flex-col w-full mt-36 gap-12">
        <h1 class="uppercase text-center text-xl text-orange-700 kumbh">{{ $item->name }}</h1>
        <p class="text-2xl pl-10 text-gray-400 animate-[pulse_5s_ease-in-out_infinite]">{{ $item->description }}</p>
        <div class="p-10 bg-gray-100">
            @if (count($item->subCategories))
                <h2 class="text-2xl text-gray-500 mb-1">Sub Categories</h2>
                <ul class="flex flex-start gap-12 menu mb-12 ">
                    @foreach ($item->subCategories as $category)
                        <li>
                            <x-myComponents.category-card :category="$category" />
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="">
                <h2 class="text-2xl text-gray-500 mb-1">Products</h2>
                <ul class="flex flex-start gap-12 flex-wrap  ">
                    @php
                        if (!function_exists('getSubCategories')) {
                            function getSubCategories($item)
                            {
                                $arr = [];
                                if (count($item->subCategories) > 0) {
                                    foreach ($item->subCategories as $subCategory) {
                                        $arr = [...$arr, $subCategory, ...getSubCategories($subCategory)];
                                    }
                                }
                                return $arr;
                            }
                            $subCategories = [$item, ...getSubCategories($item)];
                        } else {
                            $subCategories = [$item, ...getSubCategories($item)];
                        }
                        $v = 0;
                    @endphp
                    @foreach ($subCategories as $category)
                        @foreach ($category->productsCategories as $productCategory)
                            <li>
                                <x-myComponents.product-card :product="$productCategory->product" />
                            </li>
                            @php
                                $v++;
                            @endphp
                        @endforeach
                    @endforeach
                    @if ($v == 0)
                        <h1 class="text-5xl self-center w-screen text-center text-gray-500">No Products Found</h1>
                    @endif
                </ul>
            </div>
        </div>

    </main>

</x-app-layout>
