<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;

// Exercise #1
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