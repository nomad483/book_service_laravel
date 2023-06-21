<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//$api = app('Dingo\Api\Routing\Router');
//
//$api->version('v1', function ($api) {
//    $api->get('/', function () {
//        return response()->json([ 'status' => 'OK', 'timestamp' => Carbon::now()]);
//    });
//});

Route::get('/', function () {
    return response()->json(['status' => 'OK', 'timestamp' => Carbon::now()]);
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/categories/{id}', 'show');
    Route::post('/categories', 'store');
    Route::put('/categories/{id}', 'update');
    Route::delete('/categories/{id}', 'destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::get('/orders/{id}', 'show');
    Route::get('/customers/{id}/orders', 'showByCustomer');
    Route::post('/orders', 'store');
    Route::put('/orders/{id}', 'update');
    Route::delete('/orders/{id}', 'destroy');
});

Route::controller(OrderDetailController::class)->group(function () {
    Route::get('/order-details', 'index');
    Route::get('/order-details/{id}', 'show');
    Route::get('/orders/{id}/order-details', 'showByOrder');
    Route::get('/books/{id}/order-details', 'showByBook');
    Route::post('/order-details', 'store');
    Route::put('/order-details/{id}', 'update');
    Route::delete('/order-details/{id}', 'destroy');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::get('/books/{id}', 'show');
    Route::get('/author/{id}/books', 'showByAuthor');
    Route::post('/books', 'store');
    Route::put('/books/{id}', 'update');
    Route::delete('/books/{id}', 'destroy');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers', 'index');
    Route::get('/customers/{id}', 'show');
    Route::get('/user/{id}/customers', 'showByUser');
    Route::post('/customers', 'store');
    Route::put('/customers/{id}', 'update');
    Route::delete('/customers/{id}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index');
    Route::get('/authors/{id}', 'show');
    Route::post('/authors', 'store');
    Route::put('/authors/{id}', 'update');
    Route::delete('/authors/{id}', 'destroy');
});
