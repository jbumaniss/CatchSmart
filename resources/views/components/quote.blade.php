@if($quote != null)
    <div class="bg-neutral-100 text-neutral-600 border-neutral-500">
        <div class="text-center">
            <h1 class="m-4 text-xl font-bold">Inspiring Quote</h1>
            <blockquote class="p-4  text-neutral-600  quote ">
                <p class="mb-2">" {{$quote->quote}}"</p>
                <cite>- {{$quote->author}}</cite>
            </blockquote>
        </div>
    </div>
@endif
