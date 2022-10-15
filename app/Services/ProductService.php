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
        $defaultWarehouse = Warehouse::firstorCreate(["name" => "WareHouse", "address" => 'K.Valdemāra iela 11a Riga, LV-1364'])->id;
        Product::create([
                'type_id' => Type::where('name', $request->type)->first()->id,
                'warehouse_id' => $defaultWarehouse,
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description
        ]);
    }

    public function updateProduct(Product $product, UpdateProductRequest $request): void
    {
        $product->update([
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'description' => $request->description,
                "quantity" => $request->quantity
        ]);
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }
}
