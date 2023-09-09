@props(['categories'])
<x-app-layout>

    <div class="mt-36 mb-4 mx-auto w-10/12">
        <h1 class="text-3xl mb-3">Create Product</h1>
        <form id="add-product" class="flex flex-col gap-3">
            @csrf
            <fieldset class="border p-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                <legend class="text-2xl">Basic Info</legend>
                <x-form.text-input name="name" label="Product Name" placeholder="Enter name" />
                <x-form.text-input name="brand" label="Product Brand" placeholder="Enter brand" />
                <x-form.text-input name="original_price" label="Product Price" placeholder="Enter price" />
                <x-form.text-input name="discount" label="Discount(%)" value="0" placeholder="0" />
                <x-form.text-area-input name="description" label="Product Description"
                    placeholder="Enter the product's description " />
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <x-form.checkbox-group name="category[]" :items="$categories" />
                </div>
            </fieldset>

            <fieldset class="border p-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                <legend class="text-2xl">Gallary</legend>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="banner">Banner</label>
                    <input type="file" accept="image/*" name="banner" id="banner" />
                    <div id='bannerPerview' class="flex gap-1 mt-1"></div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Images</label>
                    <input type="file" accept="image/*" name="images[]" id="images" multiple />
                    <div id='imagesPerview' class="flex gap-1 mt-1 menu"></div>
                </div>

            </fieldset>
            <button
            class="bg-orange-400  text-center text-white p-2  text-xl rounded-md self-end disabled:bg-gray-400"
            >Add product</button>
        </form>
    </div>
    <script src="{{asset('/scripts/notify.js')}}"></script>
    <script src="{{asset('/scripts/add-product.js')}}"></script>
</x-app-layout>
