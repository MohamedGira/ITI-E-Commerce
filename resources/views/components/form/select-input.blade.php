@props(['name', 'label', 'items', 'selected'])
<div><label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">Select an
        option</label>
    <select id="{{ $name }}" name="{{ $name }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        <option value="" selected>Select a parent category</option>
        @foreach ($items as $item)
            @if ($selected == $item->id)
                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
        @endforeach

    </select>
</div>
