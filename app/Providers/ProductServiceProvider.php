<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function ($app) {

            // Static product list (from your first version)
            $products = [

                [
                    'id' => 1,
                    'name' => 'Apple',
                    'category' => 'Fruits',
                ],

                [
                    'id' => 2,
                    'name' => 'Broccoli',
                    'category' => 'Vegetables',
                ],

                [
                    'id' => 3,
                    'name' => 'Sardines',
                    'category' => 'Canned Foods',
                ],

            ];

            // If ProductService expects config, you can pass it as second parameter
            return new ProductService($products, $app['config']);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // You can share data globally to views here if needed
        // Example:
        // View::share('productKey', 'value');
    }
}