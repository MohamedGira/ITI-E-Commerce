@props(['items'])
<table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th class="px-6 py-3">
                Product name
            </th>
            <th class="px-6 py-3">
                Brand
            </th>
            <th class="px-6 py-3">
                Current Price
            </th>
            <th class="px-6 py-3">
                Current Discount
            </th>
            <th class="px-6 py-3 border-l-2" colspan="3">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
            @foreach ($items as $product)
            <tr class="bg-white border-b ">
                <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$product->name}}
                </th>
                <td class="px-6 py-4">
                    {{$product->brand}}
                </td>
                <td class="px-6 py-4">
                    {{$product->price}}
                </td>
                <td class="px-6 py-4">
                    {{$product->discount}}
                </td>
                <td class="px-6 py-4 border-l-2">
                    <a href="{{route('product.details',$product->id)}}">View</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('product.edit',$product->id)}}">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <form method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button>delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>