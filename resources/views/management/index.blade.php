<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">Management</h1>

    <div class="container mx-auto grid grid-rows-3 grid-flow-col gap-4 justify-center">
        <div class="text-end row-start-2 row-span-2">
            <a href="{{ route('manage.partners') }}" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400"
               type="submit">View Partners</a>
        </div>
        <div class="text-end row-start-2 row-span-2">
            <a href="{{ route('manage.types') }}" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400"
               type="submit">View Types</a>
        </div>
        <div class="text-end row-start-2 row-span-2">
            <a href="{{ route('manage.products') }}" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-400"
               type="submit">View Products</a>
        </div>
    </div>
    <x-manage-partners :partners="$partners"></x-manage-partners>
    <x-manage-products :products="$products"></x-manage-products>
</x-layout>
