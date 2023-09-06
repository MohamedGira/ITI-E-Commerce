@props(['item'])
<x-app-layout>
    <main class="my-40">
        <div class="w-8/12 flex gap-12 items-center mx-auto">
            <x-myComponents.product-image-viewer :product="$item" />
            <x-myComponents.product-details-viewer :product="$item" />
        </div>
    </main>
    <script src="{{ asset('/scripts/productDetails.js') }}"></script>

</x-app-layout>
