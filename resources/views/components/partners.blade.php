<div class="container mx-auto shadow-xl rounded p-2">
    <h1 class="m-12 text-center text-2xl font-bold">Partners</h1>
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
                        @if(count($partners) > 0)
                            @foreach($partners as $partner)
                                <tbody>
                                <tr class="border-b">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('partners.show', $partner->id) }}">{{$partner->name}}</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('partners.show', $partner->id) }}">{{$partner->address}}</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('partners.show', $partner->id) }}">{{$partner->created_at}}</a>
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
