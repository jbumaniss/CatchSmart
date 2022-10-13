<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(): View
    {
        return view('order.index',[
            "orders" => Order::latest()->get()
        ] );
    }

    public function sold(Partner $partner, Product $product, Request $request): RedirectResponse
    {

        $formFields = $request->validate([
            'quantity' => "required_if:type,Product | numeric | gt:0 | max:{$product->quantity}",
        ]);

        $this->orderService->soldOrder($partner, $product, $formFields);
        return redirect('/partners/' . $partner->id)->with('message', 'Product sold to ' . $partner->name . ' successfully');
    }
}
