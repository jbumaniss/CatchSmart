<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">All Products/Services</h1>

    <div class="container mx-auto mb-12 shadow-xl rounded p-2">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Product Name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Type
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Price
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Description
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Product Date Created
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $product->id) }}">{{$product->name}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $product->id) }}">{{$product->type}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $product->id) }}">{{$product->price}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $product->id) }}">{{$product->description}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $product->id) }}">{{$product->created_at}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                                <tbody class="text-center ">
                                <tr class="border-b grow">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        No Records Found
                                    </td>
                                </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
