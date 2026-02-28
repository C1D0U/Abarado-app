<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ProductController;
use App\Services\ProductService;


// Exercise #1 & #4
Route::get('/blade', function () {
    return view('welcome'); // 
});

Route::get('/', function () {
    return 'hello world!';
});

Route::get('show-users', [UserController::class, 'show']);

//service container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

//service providers
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

//service Provider
Route::get('/test-users', [UserController::class, 'index']);

// Facades
Route::get('test-facade', function (UserService $userService) {
    return Response::json($userService->listUsers());
});

// Exercise #3
Route::get('/test-facade', function (UserService $userService) {
});

// Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: " . $postId . " - Comment: " . $comment;
}); // http://127.0.0.1:8000/post/90/comment/hello

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+'); // http://127.0.0.1:8000/post/90

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*'); // http://127.0.0.1:8000/search/tes/t

// Named Route or Route Alias
Route::get('/test/route/sample', function () {
    return route('test-route');
})->name('test-route');

// Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
        echo 'first';
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo 'second';
    });
});

//Route -> Controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});

//CSRF
Route::get('/token', function (Request $request) {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});

// Return CSRF token
Route::post('/token', function (Request $request) {
    return csrf_token();
});

// Controller + Middleware
Route::get('/users', [UserController::class, 'index'])
    ->middleware('user-middleware');

// Resource Route (CRUD for products)
Route::resource('products', ProductController::class);

// View with data (Dependency Injection)
Route::get('/product-list', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});


Route::get('/{id}', function ($id) {
    // Only redirect if numeric
    if (is_numeric($id)) {
        return redirect()->route('products.show', ['product' => $id]);
    }

    abort(404);
})->where('id', '[0-9]+');