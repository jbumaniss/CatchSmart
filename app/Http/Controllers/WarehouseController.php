<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\View\View;

class WarehouseController extends Controller
{
    public function index():View
    {
        return view('warehouse.index',[
            "partners" => Partner::latest()->get()
        ] );
    }
}
