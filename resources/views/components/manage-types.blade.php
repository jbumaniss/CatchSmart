<div class="container mx-auto shadow-xl rounded p-2">
    <h1 class="m-12 text-center text-2xl font-bold">Types Management</h1>

    <div class="text-end">
        <a href="{{ route('types.create') }}" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400"
           type="submit">Add Type</a>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">

                    <table class="min-w-full">
                        <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                ID
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Type name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Created At
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Delete
                            </th>
                        </tr>
                        </thead>
                        @if(count($types) > 0)
                            @foreach($types as $type)
                                <tbody>
                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$type->id}}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('types.edit', $type->id) }}">{{$type->name}}</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('types.edit', $type->id) }}">{{$type->created_at}}</a>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <form method="POST" action="{{ route('types.destroy', $type->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600">
                                                <i class="fa-solid fa-trash-can"></i>
                                                Delete
                                            </button>
                                        </form>
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
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
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
