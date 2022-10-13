<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">Add Type</h1>

    <div class="container mx-auto mb-12">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Type name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Create
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-b">
                                <form action="{{route('types.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <label>
                                            <input
                                                type="text"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="name"
                                                placeholder="Example: Acme"
                                                value="{{old('name')}}"
                                            />
                                        </label>
                                        @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <button class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400"
                                                type="submit">Create Type
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
