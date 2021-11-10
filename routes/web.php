<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PackagingController;
use App\Http\Controllers\ClosuresController;

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

Route::get('/', [HomePageController::class, 'index']);

Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/subcategory', SubcategoryController::class);
Route::resource('/packaging', PackagingController::class);
Route::resource('/closures', ClosuresController::class);

