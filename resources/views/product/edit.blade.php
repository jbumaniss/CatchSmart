<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">Edit Product: {{$product->name}}</h1>

    <div class="container mx-auto mb-12">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Product name
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
                                    Quantity
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Created At
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b">
                                <form action="{{ route('products.update', $product->id) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <label>
                                            <input
                                                type="text"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="name"
                                                placeholder="Example: Milk"
                                                value="{{$product->name}}"
                                            />
                                        </label>
                                        @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <select class="border border-gray-200 rounded p-2 w-full" name="type">
                                            @foreach($types as $type)
                                                <option value="{{$type->name}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <label>
                                            <input
                                                type="text"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="price"
                                                placeholder="Example:  9.99"
                                                value="{{$product->price}}"
                                            />
                                        </label>
                                        @error('price')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <label>
                                            <input
                                                type="text"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="description"
                                                placeholder="Example:  This is a milk"
                                                value="{{$product->description}}"
                                            />
                                        </label>
                                        @error('description')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @if(!empty($product->quantity))
                                            <label>
                                                <input
                                                    type="text"
                                                    class="border border-gray-200 rounded p-2 w-full"
                                                    name="quantity"
                                                    placeholder="Example:  This is a milk"
                                                    value="{{$product->quantity}}"
                                                />
                                            </label>
                                            @error('quantity')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        @else
                                            This Product Has no Quantity
                                        @endif
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{$product->created_at}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <button class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400"
                                                type="submit">Update
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
