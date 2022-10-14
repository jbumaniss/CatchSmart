<?php


namespace App\Services;


use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Warehouse;


class OrderService
{

    public function soldOrder(Partner $partner, Product $product, CreateOrderRequest $request): void
    {
        $defaultWarehouse = Warehouse::where("id", 1)->first();

        if ($product->quantity != null) {
            $productQuantityUpdate['quantity'] = $product->quantity - $request->quantity;
            $product->update($productQuantityUpdate);
        }

        Order::create([
            'quantity' => $request->quantity,
            'partner_id' => $partner->id,
            'product_id' => $product->id,
            'warehouse_id' => $defaultWarehouse->id,
            'name' => $product->name,
            'type' => $product->type,
            'price' => $product->price,
            'description' => $product->description
        ]);
    }
}
