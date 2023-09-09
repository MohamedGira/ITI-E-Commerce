@props(['items'])
<x-app-layout>
    <div class="mt-36 mb-4 mx-auto w-10/12">
        <div class="relative overflow-x-auto">
            <x-myComponents.products-table :items="$items" />
        </div>
    </div>

</x-app-layout>
