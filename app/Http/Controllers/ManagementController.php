<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Product;
use App\Models\Type;
use Illuminate\View\View;

class ManagementController extends Controller
{

    public function index():View
    {
        return view('management.index',[
            "partners" => Partner::get(),
            "products" => Product::get()
        ] );
    }

    public function partners():View
    {
        return view('management.partners',[
            "partners" => Partner::get()
        ] );
    }

    public function types():View
    {
        return view('management.types',[
            "types" => Type::get()
        ] );
    }

    public function products():View
    {
        return view('management.products',[
            "products" => Product::get()
        ] );
    }
}
