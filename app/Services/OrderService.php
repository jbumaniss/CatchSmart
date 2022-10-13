<?php


namespace App\Services;


use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Type;
use App\Models\Warehouse;


class OrderService
{

    public function soldOrder(Partner $partner, Product $product, array $formFields): void
    {
        $defaultWarehouse = Warehouse::where("id", 1)->first();

        $formFields['partner_id'] = $partner->id;
        $formFields['product_id'] = $product->id;
        $formFields['warehouse_id'] = $defaultWarehouse->id;
        $formFields['name'] = $product->name;
        $formFields['type'] = $product->type;
        $formFields['price'] = $product->price;
        $formFields['description'] = $product->description;

        if ($product->quantity != null){
            $productQuantityUpdate['quantity'] = $product->quantity - $formFields['quantity'];
            $product->update($productQuantityUpdate);
        }

        Order::create($formFields);
    }
}
