<?php


namespace App\Services;


use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Type;
use App\Models\Warehouse;


class ProductService
{

    public function storeProduct(CreateProductRequest $request): void
    {
        $defaultWarehouse = Warehouse::where("id", 1)->firstorCreate(["name" => "WareHouse", "address" => 'Latvia']);

        Product::create([
            [
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'type_id' => Type::where('name', $_POST['type'])->first()->id,
                'warehouse_id' => $defaultWarehouse->id
            ]
        ]);
    }

    public function updateProduct(Product $product, UpdateProductRequest $request): void
    {
        $product->update([
            [
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'description' => $request->description,
                "quantity" => $request->quantity
            ]
        ]);
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }
}
