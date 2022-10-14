<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Product;
use App\Models\Type;
use Illuminate\View\View;

class ManagementController extends Controller
{

    public function index(): View
    {
        return view('management.index', [
            "partners" => Partner::latest()->paginate(6),
            "products" => Product::latest()->paginate(6)
        ]);
    }

    public function partners(): View
    {
        return view('management.partners', [
            "partners" => Partner::latest()->paginate(6)
        ]);
    }

    public function types(): View
    {
        return view('management.types', [
            "types" => Type::latest()->paginate(6)
        ]);
    }

    public function products(): View
    {
        return view('management.products', [
            "products" => Product::latest()->paginate(6)
        ]);
    }
}
