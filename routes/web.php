<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\Client\HomeController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('list-product', function () {
//     return view('admin.product.list-product');
// });
// Route::get('list-client', function () {
//     return view('client.product.list-client');
// });

// đăng nhập admin
Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
// đăng xuất admin
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
// đăng kí user
Route::get('register', [AuthenController::class, 'register'])->name('register');
Route::post('register', [AuthenController::class, 'postRegister'])->name('postRegister');

// Quên mật khẩu
Route::get('forgot', [AuthenController::class, 'forgotPassword'])->name('forgotPassword');


// ADMIN
// middleware là bảo vệ route của chúng ta kiểm tra xem có quyền đăng nhập hay chưa
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkAdmin'], function () {
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'dashBoard'])->name('dashBoard');
        Route::get('list-user', [UserController::class, 'listUsers'])->name('listUsers');
        Route::post('add-user', [UserController::class, 'addUsers'])->name('addUsers');
        Route::delete('delete-user', [UserController::class, 'deleteUsers'])->name('deleteUsers');
        Route::get('detail-user', [UserController::class, 'detailUsers'])->name('detailUsers');
        Route::patch('update-user', [UserController::class, 'updatelUsers'])->name('updatelUsers');
        
    });
    Route::group(['prefix' => 'product' , 'as' => 'product.'],function(){
        Route::get('list-product',[ProductController::class ,'listProducts'])->name('listProducts');
        Route::get('add-product',[ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product',[ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product',[ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('detail-product/{idProduct}',[ProductController::class, 'detailProduct'])->name('detailProduct');
        Route::get('update-product/{idProduct}',[ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product/{idProduct}',[ProductController::class, 'updatePactchProduct'])->name('updatePactchProduct');
        
    });
    Route::group(['prefix' => 'category' , 'as' => 'category.'], function(){
        Route::get('list-category', [CategoryController::class, 'listCategories'])->name('listCategories');
        Route::get('add-category', [CategoryController::class, 'addCategories'])->name('addCategories');
        Route::post('add-category', [CategoryController::class, 'addPostCategories'])->name('addPostCategories');
        Route::delete('delete-category', [CategoryController::class, 'deleteCategories'])->name('deleteCategories');
        Route::get('update-category/{idProduct}', [CategoryController::class, 'updateCategories'])->name('updateCategories');
        Route::patch('update-category/{idProduct}', [CategoryController::class, 'updatePatchCategories'])->name('updatePatchCategories');
    });

    Route::group(['prefix' => 'banner' , 'as' => 'banner.'], function(){
        Route::get('list-banner', [BannerController::class, 'listBanner'])->name('listBanner');
        Route::get('add-banner', [BannerController::class, 'addBanner'])->name('addBanner');
        Route::post('add-banner', [BannerController::class, 'addPostBanner'])->name('addPostBanner');
        Route::delete('delete-banner', [BannerController::class, 'deleteBanner'])->name('deleteBanner');
        Route::get('detail-banner/{idProduct}',[BannerController::class, 'detailBanner'])->name('detailBanner');
        Route::get('update-banner/{idProduct}', [BannerController::class, 'updateBanner'])->name('updateBanner');
        Route::patch('update-banner/{idProduct}', [BannerController::class, 'updatePatchBanner'])->name('updatePatchBanner');
    });
});

Route::get('/', function(){
    return redirect()->route('client.listClients');
});
Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
    Route::get('list-client', [HomeController::class, 'listClients'])->name('listClients');
    Route::get('product-shop', [HomeController::class, 'product'])->name('product');
    Route::get('detail-product/{id}', [HomeController::class, 'detailProduct'])->name('detailProduct');
    Route::get('search-product', [HomeController::class, 'searchProduct'])->name('searchProduct');
    Route::get('search-product-shop', [HomeController::class, 'searchProductShop'])->name('searchProductShop');

    
});



// Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
//     Route::get('list-product', [ProductController::class, 'listProducts'])->name('listProducts'); 
// });
