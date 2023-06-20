<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::get('/books/{id}', 'show');
    Route::get('/author/{id}/books', 'showByAuthor');
    Route::post('/books', 'store');
    Route::put('/books/{id}', 'update');
    Route::delete('/books/{id}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index');
    Route::get('/authors/{id}', 'show');
    Route::post('/authors', 'store');
    Route::put('/authors/{id}', 'update');
    Route::delete('/authors/{id}', 'destroy');
});
