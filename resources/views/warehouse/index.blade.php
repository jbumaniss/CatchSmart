<x-layout>
    <h1 class="m-12 text-center text-2xl font-bold">{{$warehouse->name}}</h1>
    <x-quote :quote="$quote"></x-quote>
    <x-partners :partners="$partners"></x-partners>
</x-layout>
