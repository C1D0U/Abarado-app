<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ProductService
{
    protected $products;

    public function __construct()
    {
        // Default initial products
        $this->products = collect([
            ['id' => 1, 'name' => 'Apple', 'category' => 'fruit'],
            ['id' => 2, 'name' => 'Carrot', 'category' => 'vegetable'],
            ['id' => 3, 'name' => 'Banana', 'category' => 'fruit'],
        ]);
    }

    /**
     * List all products
     */
    public function listProducts()
    {
        return $this->products;
    }

    /**
     * Insert a new product
     */
    public function insert(array $product)
    {
        $this->products->push($product);
        return $product;
    }
}