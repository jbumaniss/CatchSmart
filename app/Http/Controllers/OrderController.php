<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(): View
    {
        return view('order.index', [
            "orders" => Order::latest()->paginate(6)
        ]);
    }

    public function sold(Partner $partner, Product $product, CreateOrderRequest $request): RedirectResponse
    {
        try {
            $this->orderService->soldOrder($partner, $product, $request);
        } catch (Throwable $exception) {
            report($exception);
            return back()->with('message', 'Product sold to ' . $partner->name . ' failed');
        }

        return redirect('/partners/' . $partner->id)->with('message', 'Product sold to ' . $partner->name . ' successfully');
    }
}
