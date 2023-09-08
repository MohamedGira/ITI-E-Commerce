@props(['category', 'categories'])
<x-app-layout>
    <div class="mt-36 mb-4 mx-auto w-10/12">
        <h1 class="text-3xl mb-3">Edit {{ $category->name }} Category</h1>
        <form id="edit-category" class="flex flex-col gap-3">
            @csrf
            @method('PATCH')
            <input type="hidden" name="cat_id" value="{{ $category->id }}" />
            <fieldset class="border p-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                <legend class="text-2xl">Basic Info</legend>
                <x-form.text-input name="name" label="Category Name" :value="$category->name" placeholder="Enter name" />
                <x-form.select-input name="parent_id" label="Parent" :items="$categories" :selected="$category->parent_id" />
                <x-form.text-area-input name="description" label="Category Description"
                    placeholder="Enter the Category's description " :value="$category->description" />

            </fieldset>

            <fieldset class="border p-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                <legend class="text-2xl">Gallary</legend>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="banner">Banner</label>
                    <input type="file" accept="image/*" name="banner" id="banner" />
                    <div id='bannerPerview' class="flex gap-1 mt-1">
                        @if ($category->images()->where('name', 'banner')->first())
                            <div class="relative"
                                id="{{ $category->images()->where(`name`, `bannner`)->first()?->id }}">
                                <button type="button"
                                    class="absolute w-7 h-7 top-1 right-1 rounded-full bg-white opacity-80"
                                    onclick="removeImage('{{ $category->images()->where(`name`, `bannner`)->first()?->id }}','edit-category')">&#10005;</button>
                                <img id="{{ $category->images()->where('name', 'banner')->first()?->id }}_img"
                                    src="{{ $category->images()->where('name', 'banner')->first()?->name_on_disk }}"
                                    alt="banner" class="w-24 aspect-square object-cover rounded-md" />

                            </div>
                        @endif
                    </div>
            </fieldset>
            <button
                class="bg-orange-400  text-center text-white p-2  text-xl rounded-md self-end disabled:bg-gray-400">Edit
                Category</button>
        </form>
    </div>
    <script src="{{ asset('/scripts/utils.js') }}"></script>
    <script src="{{ asset('/scripts/edit-category.js') }}"></script>
</x-app-layout>
