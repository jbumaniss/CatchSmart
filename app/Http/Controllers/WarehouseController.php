<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WarehouseController extends Controller
{
    public function index():View
    {
        return view('warehouse.index',[
            "warehouse" => Warehouse::first(),
            "partners" => Partner::latest()->paginate(6),
            "quote" => DB::table('quotes')->first()
        ] );
    }
}
