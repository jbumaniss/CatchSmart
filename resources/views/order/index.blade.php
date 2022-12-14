<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">All Orders</h1>

    <div class="container mx-auto mb-12 shadow-xl rounded p-2">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Order Name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Buyer
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
                                    Transaction Date
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($orders) > 0)
                                @foreach($orders as $order)
                                    <tr class="border-b">
                                        @if($order->product->trashed())
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$order->product->name}} <p class="text-red-600">DELETED PRODUCT!!!</p>
                                            </td>
                                        @else
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('partners.show', $order->partner_id) }}">{{$order->product->name}}</a>
                                            </td>
                                        @endif
                                        @if($order->partner->trashed())
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$order->partner->name}} <p class="text-red-600">DELETED PARTNER!!!</p>
                                        </td>
                                        @else
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('partners.show', $order->partner_id) }}">{{$order->partner->name}}</a>
                                            </td>
                                        @endif
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$order->type}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$order->price}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$order->description}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$order->created_at}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                                <tbody class="text-center " >
                                <tr class="border-b grow">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    </td>
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
    <div class="mt-6 p-4">
        {{$orders->links() }}
    </div>
</x-layout>
