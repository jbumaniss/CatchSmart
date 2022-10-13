<nav class="flex justify-between items-center mb-4 bg-blue-300 h-18 w-full p-2">
    <a href="{{route('warehouse.index')}}">
        <img class="w-10 logo" src="{{asset('images/logo.png')}}" alt=""/>
    </a>
    <div>
        <a href="{{route('warehouse.index')}}" class="hover:text-laravel">
            <i class="fa-solid fa-warehouse mr-2"></i>WareHouse
        </a>
    </div>
    <div>
        <a href="{{route('partners.index')}}" class="hover:text-laravel">
            <i class="fa-solid fa-handshake mr-2"></i>Partners
        </a>
    </div>
    <div>
        <a href="{{route('products.index')}}" class="hover:text-laravel">
            <i class="fa-solid fa-store mr-2"></i>Products/Services
        </a>
    </div>
    <div>
        <a href="{{route('orders.index')}}" class="hover:text-laravel">
            <i class="fa-solid fa-shopping-cart mr-2"></i>Orders
        </a>
    </div>
    <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="{{route('manage.index')}}" class="hover:text-laravel">
                    <i class="fa-solid fa-gear mr-2"></i>Manage Section
                </a>
            </li>
    </ul>
</nav>
