<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">Show Partner Company: {{$partner->name}}</h1>

    <div class="container mx-auto mb-12">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Partner name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Address
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Created At
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{$partner->name}}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{$partner->address}}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{$partner->created_at}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="m-12 text-center text-2xl font-bold">Warehouse Products</h1>

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
                                    Quantity
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Sell
                                </th>
                            </tr>
                            </thead>
                            @if(count($products) > 0)
                                @foreach($products as $product)
                                    @if($product->quantity != 0 || $product->quantity === null)
                                        <tbody>
                                        <tr class="border-b">
                                            <form method="POST" action="{{ route('orders.sold', ['partner' => $partner->id, 'product' => $product->id]) }}">
                                                @csrf
                                                @method("PUT")
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
                                                @if(!empty($product->quantity))
                                                    <label>
                                                        Available: {{$product->quantity}} pcs <input
                                                            type="number"
                                                            class="border border-gray-200 rounded p-2"
                                                            name="quantity"
                                                            placeholder="Example: {{$product->quantity}}"
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
                                                <button class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400" type="submit">Sell</button>
                                            </td>
                                            </form>
                                        </tr>
                                        </tbody>
                                    @endif
                                @endforeach
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

        <h1 class="m-12 text-center text-2xl font-bold">Warehouse Sold Products To: {{$partner->name}}</h1>

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
                                    Sold Quantity
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Transaction Date
                                </th>
                            </tr>
                            </thead>
                            @if(count($orders) > 0)
                                @foreach($orders as $order)
                                    <tbody>
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $order->product_id) }}">{{$order->name}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $order->product_id) }}">{{$order->type}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $order->product_id) }}">{{$order->price}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $order->product_id) }}">{{$order->description}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $order->product_id) }}">{{$order->quantity}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('products.show', $order->product_id) }}">{{$order->created_at}}</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
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
