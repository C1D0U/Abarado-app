<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\TaskService;

class ProductController extends Controller
{
    protected $productService;
    protected $taskService;

    public function __construct(ProductService $productService, TaskService $taskService)
    {
        $this->productService = $productService;
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Add a new product example
        $newProduct = [
            'id' => 4,
            'name' => 'Orange',
            'category' => 'fruit'
        ];

        $this->productService->insert($newProduct);

        // Add some tasks
        $this->taskService->add('Add to cart');
        $this->taskService->add('Checkout');

        // Get all products
        $products = $this->productService->listProducts();

        // Optional filtering by id
        if ($request->has('id')) {
            $id = $request->id;

            $products = $products->filter(function ($item) use ($id) {
                return $item['id'] == $id;
            });
        }

        $data = [
            'products' => $products,
            'tasks' => $this->taskService->getAllTasks()
        ];

        return view('products.index', $data);
    }

    /**
     * Display a single product.
     */
    public function show($id)
    {
        // Get all products
        $products = $this->productService->listProducts();

        // Find product by id
        $product = $products->firstWhere('id', (int) $id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Include tasks
        $tasks = $this->taskService->getAllTasks();

  
        return view('products.list', compact('product', 'tasks'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return 'Create product form';
    }

    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        return 'Store product';
    }

    /**
     * Show the form for editing the product.
     */
    public function edit($id)
    {
        return "Edit product $id";
    }

    /**
     * Update the product.
     */
    public function update(Request $request, $id)
    {
        return "Update product $id";
    }

    /**
     * Delete the product.
     */
    public function destroy($id)
    {
        return "Delete product $id";
    }
}