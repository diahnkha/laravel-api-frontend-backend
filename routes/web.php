<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('landing');
})->name("homepage")->middleware(["withauth"]);

// Route::get("/", [ProductController::class, "landing"])->name("homepage")->middleware(["withauth"]);
// Route::get("/", [ProductController::class, "index"])->name("list");

Route::prefix("product")->middleware(["withauth"])->group(function(){
    Route::get("/list", [ProductController::class, "index"])->name("product.list");
    Route::get("/detail/{id}", [ProductController::class, "detail"])->name("product.detail");
    Route::any('/store', [ProductController::class, "store"])->name("product.store");

    Route::post("/create", [ProductController::class, "create"])->name("product.create");
    Route::put("/update/{id}", [ProductController::class, "update"])->name("product.update");
    Route::get("/destroy/{id}", [ProductController::class, "destroy"])->name("product.destroy");
});

Route::prefix("blog")->middleware(["withauth"])->group(function(){
    Route::get("/detaillengkap", [blogController::class, "index"])->name("blog.detaillengkap");
    Route::get("/listlengkap", [blogController::class, "detaillengkap"])->name("blog.detaillengkap");
    Route::get("/detail/{id}", [blogController::class, "detail"])->name("blog.detail");
    Route::get("/listdetail/{id}", [blogController::class, "listdetail"])->name("blog.listdetail");
    Route::any('/store', [blogController::class, "store"])->name("blog.store");

    Route::post("/create", [blogController::class, "create"])->name("blog.create");
    Route::put("/update/{id}", [blogController::class, "update"])->name("blog.update");
    Route::get("/destroy/{id}", [blogController::class, "destroy"])->name("blog.destroy");
});


// Route::get('/', function(){
//     return view('welcome');

// })->name("homepage")->middleware(["withauth"]);;
Route::any("/login", [AuthController::class, "login"])->name("login")->middleware(["noauth"]);
Route::any("/logout", [AuthController::class, "logout"])->name("logout")->middleware(["withauth"]);
