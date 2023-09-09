@props(['items'])
<table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">
                Category name
            </th>
            <th class="px-6 py-3">
                Description 
            </th>
            <th class="px-6 py-3">
                Parent Category
            </th>
            <th class="px-6 py-3 border-l-2" colspan="3">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $category)
            <tr class="bg-white border-b ">
                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $category->name }}
                </th>
                <td class="px-6 py-4 relative list-none">
                    <details>
                        <summary >
                            Details
                        </summary>
                        <div class="absolute  top-10 left-0 bg-white border border-gray-400 px-2 py-1 z-50">
                        {{ $category->description }}
                        </div>
                    </details>
                </td>
                <td class="px-6 py-4">
                    {{ $category->parentCategory->name ?? '' }}
                </td>
           
                <td class="px-6 py-4 border-l-2">
                    <a href="{{ route('category.details', $category->id) }}">View</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <form action="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <button>delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>