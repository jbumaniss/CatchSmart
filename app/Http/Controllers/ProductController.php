<?php




namespace App\Http\Controllers;


use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Type;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

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
            "products" => Product::latest()->paginate(6)
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

    public function store(CreateProductRequest $request): RedirectResponse
    {
        try {
            $this->productService->storeProduct($request);
            return redirect('/manage/products')->with('message', 'Product created successfully');
        }catch(Throwable $exception){
            report($exception);
            return redirect('/manage/products')->with('message', 'Product create failed');
        }
    }

    public function edit(Product $product): View
    {
        return view('product.edit', [
            'product' => $product,
            'types' => Type::get()
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        try {
            $this->productService->updateProduct($product, $request);
            return redirect('/manage/products')->with('message', 'Product updated successfully');
        }catch(Throwable $exception){
            report($exception);
            return redirect('/manage/products')->with('message', 'Product updated failed');
        }
    }

    public function destroy(Product $product): RedirectResponse
    {
        try {
            $this->productService->deleteProduct($product);
            return redirect('/manage/products')->with('message', 'Product deleted successfully');
        }catch(Throwable $exception){
            report($exception);
            return redirect('/manage/products')->with('message', 'Product delete failed');
        }
    }
}
