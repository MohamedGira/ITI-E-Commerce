@props(['product', 'categories'])
<x-app-layout>

    <div class="mt-36 mb-4 mx-auto w-10/12">
        <h1 class="text-3xl mb-3">Edit Product</h1>
        <form id="edit-product" class="flex flex-col gap-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="prod_id" value="{{ $product->id }}" />

            <fieldset class="border p-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                <legend class="text-2xl">Basic Info</legend>
                <x-form.text-input :value="$product->name" name="name" label="Product Name" placeholder="Enter name" />
                <x-form.text-input :value="$product->brand" name="brand" label="Product Brand" placeholder="Enter brand" />
                <x-form.text-input :value="$product->original_price" name="original_price" label="Product Price"
                    placeholder="Enter price" />
                <x-form.text-input :value="$product->discount" name="discount" label="Discount(%)" value="0"
                    placeholder="0" />
                <x-form.text-area-input name="description" label="Product Description"
                    placeholder="Enter the product's description " :value="$product->description" />
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <x-form.checkbox-group name="category[]" :items="$categories" :checked="$product->categories" />
                </div>
            </fieldset>

            <fieldset class="border p-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                <legend class="text-2xl">Gallary</legend>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="banner">Banner</label>
                    <input type="file" accept="image/*" name="banner" id="banner" />
                    <div id='bannerPerview' class="flex gap-1 mt-1">
                        @if ($product->images()->where('name', 'banner')->first())
                            @php
                                $banner = $product->images()->where('name', 'banner')->first();
                            @endphp
                            <div class="relative" id="{{ $banner?->id }}">
                                <button type="button"
                                    class="absolute w-7 h-7 top-1 right-1 rounded-full bg-white opacity-80"
                                    onclick="removeImage('{{ $banner?->id }}','edit-product')">&#10005;</button>
                                <img id="{{ $banner?->id }}_img"
                                    src="{{ $banner?->name_on_disk }}"
                                    alt="banner" class="w-24 aspect-square object-cover rounded-md" />

                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Images</label>
                    <input type="file" accept="image/*" name="images[]" id="images" multiple />
                    <div id='imagesPerview' class="flex gap-1 mt-1 menu">
                        
                    </div>
                    <div id='imagesPerview2' class="flex gap-1 mt-1 menu">
                        @if (count(
                                $product->images()->where('name', 'anonymous')->get()))
                            @foreach ($product->images()->where('name', 'anonymous')->get() as $image)
                                <div class="relative" id="{{ $image?->id }}">
                                    <button type="button"
                                        class="absolute w-7 h-7 top-1 right-1 rounded-full bg-white opacity-80"
                                        onclick="removeImage('{{ $image?->id }}','edit-product')">&#10005;</button>
                                    <img id="{{ $image?->id }}_img" src="{{ $image?->name_on_disk }}" alt="banner"
                                        class="w-24 aspect-square object-cover rounded-md" />
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </fieldset>
            <button
                class="bg-orange-400  text-center text-white p-2  text-xl rounded-md self-end disabled:bg-gray-400">Edit
                product</button>
        </form>
    </div>
    <script src="{{ asset('/scripts/utils.js') }}"></script>
    <script src="{{ asset('/scripts/edit-product.js') }}"></script>

</x-app-layout>
