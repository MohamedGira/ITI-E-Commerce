@props(['products'])
<x-app-layout>
    <main class="mt-36">
        <form action="">
            <div class="grid grid-cols-2">
                <div class="flex flex-col gap-12 w-full px-12">
                    <ul id="lst" class="flex flex-col gap-4 overflow-y-auto h-[680px] px-10">
                        @foreach ($products as $product)
                            <x-myComponents.cart-item-card :product="$product" />
                        @endforeach
                    </ul>
                    <hr>
                    <div class="flex justify-between">
                        <span class="text-2xl font-black">total</span>
                        <span class="text-2xl" id="total"></span>
                    </div>
                </div>
                <div class="flex flex-row p-20">
                    @if ($products->count() == 0)
                        <button disabled type="submit"
                            class="bg-orange-400 w-full text-center text-white p-5 mx-24 text-2xl rounded-md self-end disabled:bg-gray-400">Checkout</button>
                    @else
                        <button id='checkout' type="submit"
                            class="bg-orange-400 w-full text-center text-white p-5 mx-24 text-2xl rounded-md self-end disabled:bg-gray-400">Checkout</button>
                    @endif

                </div>
            </div>
        </form>
    </main>
    <script src="{{ asset('/scripts/cart.js') }}"></script>
</x-app-layout>
