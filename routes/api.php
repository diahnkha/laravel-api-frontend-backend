<?php

use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("/pengguna", [PenggunaController::class, "index"]);
// Route::get("/pengguna/{id}", [PenggunaController::class, "show"]);
// Route::post("/pengguna", [PenggunaController::class, "store"]);
// Route::put("/pengguna/{id}", [PenggunaController::class, "update"]);
// Route::delete("/pengguna/{id}", [PenggunaController::class, "destroy"]);

// Route::get("/product", [ProductController::class, "index"]);
// Route::get("/product/{id}", [ProductController::class, "show"]);
// Route::post("/product", [ProductController::class, "store"]);
// Route::put("/product/{id}", [ProductController::class, "update"]);
// Route::delete("/product/{id}", [ProductController::class, "destroy"]);

// Route::get("/blog", [BlogController::class, "index"]);
// Route::get("/blog/{id}", [BlogController::class, "show"]);
// Route::post("/blog", [BlogController::class, "store"]);
// Route::put("/blog/{id}", [BlogController::class, "update"]);
// Route::delete("/blog/{id}", [BlogController::class, "destroy"]);

// Route::get('/pengguna/list', [PenggunaController::class, 'index']);
// Route::get('/pengguna/{id}/show', [PenggunaController::class, 'show']);
// Route::post('/pengguna/store', [PenggunaController::class, 'store']);
// Route::post('/pengguna/{id}/update', [PenggunaController::class, 'update']);
// Route::post('/pengguna/{id}/delete', [PenggunaController::class, 'destroy']);

// Route::get('/product/list', [ProductController::class, 'index']);
// Route::get('/product/{id}/show', [ProductController::class, 'show']);
// Route::post('/product/store', [ProductController::class, 'store']);
// Route::post('/product/{id}/update', [ProductController::class, 'update']);
// Route::post('/product/{id}/delete', [ProductController::class, 'destroy']);

Route::get('/blog/list', [BlogController::class, 'index']);
Route::get('/blog/{id}/show', [BlogController::class, 'show']);
Route::post('/blog/store', [BlogController::class, 'store']);
Route::post('/blog/{id}/update', [BlogController::class, 'update']);
Route::post('/blog/{id}/delete', [BlogController::class, 'destroy']);
