<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateFemaleProductController;
use App\Http\Controllers\CreateMaleProductController;
use App\Http\Controllers\CreateShoesProductController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoControll;
use App\Http\Controllers\SpmaleController;
use App\Http\Controllers\Male_productController;
use App\Http\Controllers\Female_productController;
use App\Http\Controllers\FemaleController;
use App\Http\Controllers\MaleController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoesController;
use App\Http\Controllers\UI;
use App\Http\Controllers\UI\CartController;
use App\Http\Controllers\UpdateFemaleController;
use App\Http\Controllers\UpdateMaleController;
use App\Http\Controllers\UpdateShoesController;
use App\Http\Middleware\Admin;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', [Male_productController::class, 'index']);
// Route::get('/', [Female_productController::class, 'index']);
Route::get('/', [ProductsController::class, 'index']);

// thêm sản phẩm vào giỏ hàng
Route::post('/addcart/{id}', [ProductsController::class, 'addcart'])->name('addcart');



/*---- Admin -----*/

Route::get('/admin', function () {
    return view('admin.index');
});

/*---- End Admin ----- */

Route::post('demo/store', [DemoControll::class, 'store'])->name('demo.store');

Route::get('demo', [DemoControll::class, 'index'])->name('demo');

/*-- Thêm sản phẩm male --*/

Route::post('createSpMale', [Male_productController::class, 'store'])->name('themspmale');

Route::get('createMale', [Male_productController::class, 'index'])->name('createMale');



Route::post('addspmale', [SpmaleController::class, 'store'])->name('addspmale');

Route::get('spmale', [SpmaleController::class, 'index'])->name('spmale');

/*-- End Add sản phẩm male --*/


Route::post('contactui/store', [DemoControll::class, 'store'])->name('contact.store');



/*---- render ui ----*/
Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('welcome');


/** thêm sản phẩm vào giỏ hàng */
Route::post('/addcart/{id}', [App\Http\Controllers\ProductsController::class, 'addcart'])->name('addcart');
Route::post('/addcartB/{id}', [App\Http\Controllers\ProductsController::class, 'addcartB'])->name('addcartB');
Route::post('/addcartS/{id}', [App\Http\Controllers\ProductsController::class, 'addcartS'])->name('addcartS');

//xóa
// Route::post('/deleteItem/{id}', [ProductsController::class, 'dltItem'])->name('deleteItem');
Route::DELETE('/cart/delete/{id}', [productsController::class, 'dltItem'])->name('deleteItem');
// sửa
Route::post('/updateItem/{id}', [ProductsController::class, 'updataItem'])->name('updateItem');
//order
Route::post('/order/{id}', [ProductsController::class, 'orderItem'])->name('orderItem');
//cancel order
Route::post('/cancelOrder/{id}', [ProductsController::class, 'cancelOrder'])->name('cancelOrder');

//admin duyệt đơn
Route::post('/comfirm/{id}', [ProductsController::class, 'comfirm'])->name('comfirm');


/**end thêm sản phẩm vào giỏ hàng */


//render ui
Route::get('/maleui', [App\Http\Controllers\UI\MaleController::class, 'index'])->name('maleUI');
Route::get('/femaleui', [App\Http\Controllers\UI\FemaleController::class, 'index'])->name('femaleUI');
Route::get('/shoesui', [App\Http\Controllers\UI\ShoesController::class, 'index'])->name('shoesUI');

Route::post('/contactuisubmit', [App\Http\Controllers\UI\ContactController::class, 'store'])->name('contactUIsubmit');
Route::get('/contactui', [App\Http\Controllers\UI\ContactController::class, 'index'])->name('contactUI');

Route::get('/cartui', [ProductsController::class, 'showcart'])->name('cartUI');



/*-- Admin --*/
Auth::routes();

/*-- create product --*/
Route::group(['middleware' => 'isadmin'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/order', [App\Http\Controllers\ProductsController::class, 'showOrder'])->name('order');
    Route::get('/male', [App\Http\Controllers\MaleController::class, 'index'])->name('male');
    Route::get('/female', [App\Http\Controllers\FemaleController::class, 'index'])->name('female');
    Route::get('/shoes', [App\Http\Controllers\ShoesController::class, 'index'])->name('shoes');
    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

    /** Male product */
    Route::post('/add-spmale', [CreateMaleProductController::class, 'store'])->name('add-male');
    Route::get('/create-maleproduct', [CreateMaleProductController::class, 'index'])->name('create-male');
    /**End Male product */


    /** Female product */
    Route::post('/add-spfemale', [CreateFemaleProductController::class, 'store'])->name('add-spfemale');
    Route::get('/create-femaleproduct', [CreateFemaleProductController::class, 'index'])->name('create-female');
    /** End Female product */


    Route::post('/add-spshoes', [CreateShoesProductController::class, 'store'])->name('add-spshoes');
    Route::get('/create-shoes', [CreateShoesProductController::class, 'index'])->name('create-shoes');

    /*-- end create product --*/


    /** sửa sản phẩm */
    Route::get('/female/show/{id}', [UpdateFemaleController::class, 'index'])->name('update-spfemale');
    Route::post('/show-female/{id}', [UpdateFemaleController::class, 'update'])->name('show-female');

    Route::get('/male/show/{id}', [UpdateMaleController::class, 'index'])->name('update-spmale');
    Route::post('/show-male/{id}', [UpdateMaleController::class, 'update'])->name('show-male');

    Route::get('/shoes/show/{id}', [UpdateShoesController::class, 'index'])->name('update-spshoes');
    Route::post('/show-shoes/{id}', [UpdateShoesController::class, 'update'])->name('show-shoes');

    /** end sửa sản phẩm */

    /** delete */
    Route::DELETE('/layouts/contact/delete/{id}', [ContactController::class, 'destroy'])->name('delete-contact');
    Route::DELETE('/layouts/female/delete/{id}', [FemaleController::class, 'destroy'])->name('delete-female');
    // Route::DELETE('/layouts/male/delete/{id}', [MaleController::class, 'destroy'])->name('delete-male');
    Route::DELETE('layouts/male/delete/{id}', [MaleController::class, 'destroy'])->name('delete-male');
    Route::DELETE('layouts/shoes/delete/{id}', [ShoesController::class, 'destroy'])->name('delete-shoes');

    // xóa đơn hàng
    // Route::DELETE('/order/delete/{orderNumber}', [productsController::class, 'dltOrder'])->name('dltOrder');

    /** end delete */

    /* end Admin */
});
