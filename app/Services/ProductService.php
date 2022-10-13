<?php


namespace App\Services;


use App\Models\Product;
use App\Models\Type;
use App\Models\Warehouse;


class ProductService
{

    public function storeProduct(array $formFields): void
    {
        $defaultWarehouse = Warehouse::where("id", 1)->firstorCreate(["name" => "WareHouse", "address" => 'Latvia']);
        $formFields['type_id'] = Type::where('name', $_POST['type'])->first()->id;
        $formFields['warehouse_id'] = $defaultWarehouse->id;


        Product::create($formFields);
    }

    public function updateProduct(Product $product, array $formFields): void
    {
        $product->update($formFields);
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }
}
