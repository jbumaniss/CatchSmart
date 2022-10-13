<?php




namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use App\Models\Type;
use App\Models\Warehouse;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index(): View
    {
        return view('product.index',[
            "products" => Product::latest()->get()
        ] );
    }

    public function show(Product $product): View
    {
        return view('product.show', [
            'product' => $product,
            'orders' => Order::where("product_id", $product->id)->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('product.create', [
            'types' => Type::get()
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required | numeric',
            'description' => 'required',
            'quantity' => 'required_if:type,Product'
        ]);


        $this->productService->storeProduct($formFields);
        return redirect('/manage/products')->with('message', 'Product created successfully');
    }

    public function edit(Product $product): View
    {
        return view('product.edit', [
            'product' => $product,
            'types' => Type::get()
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required | numeric',
            'description' => 'required',
            "quantity" => 'required_if:type,Product'
        ]);


        $this->productService->updateProduct($product, $formFields);
        return redirect('/manage/products')->with('message', 'Product updated successfully');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->productService->deleteProduct($product);
        return redirect('/manage/products')->with('message', 'Product deleted successfully');
    }
}
