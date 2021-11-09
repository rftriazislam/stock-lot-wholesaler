<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Reseller\ResellerController;

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
Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/logout-logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


//------------------------------------------------------------Admin----------------------------------------------------------------------------------
Route::group(['middleware' => ['auth', 'admin'],], function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/dashboard/category/add', [AdminController::class, 'add_category'])->name('add.category');
    Route::post('/dashboard/category/save', [AdminController::class, 'save_category'])->name('save.category');
    Route::get('/dashboard/category/lists', [AdminController::class, 'list_category'])->name('list.category');
    Route::get('/dashboard/category/delete/{id}', [AdminController::class, 'delete_category'])->name('delete.category');
    Route::get('/dashboard/category/status/{id}', [AdminController::class, 'status_category'])->name('status.category');
    Route::get('/dashboard/category/edit/{id}', [AdminController::class, 'edit_category'])->name('edit.category');
    Route::post('/dashboard/category/update', [AdminController::class, 'update_category'])->name('update.category');

    Route::get('/dashboard/subcategory/add', [AdminController::class, 'add_subcategory'])->name('add.subcategory');
    Route::post('/dashboard/subcategory/save', [AdminController::class, 'save_subcategory'])->name('save.subcategory');
    Route::get('/dashboard/subcategory/lists', [AdminController::class, 'list_subcategory'])->name('list.subcategory');
    Route::get('/dashboard/subcategory/delete/{id}', [AdminController::class, 'delete_subcategory'])->name('delete.subcategory');
    Route::get('/dashboard/subcategory/status/{id}', [AdminController::class, 'status_subcategory'])->name('status.subcategory');
    Route::get('/dashboard/subcategory/edit/{id}', [AdminController::class, 'edit_subcategory'])->name('edit.subcategory');
    Route::post('/dashboard/subcategory/update', [AdminController::class, 'update_subcategory'])->name('update.subcategory');

    //----------merchant----------
    Route::get('/dashboard/merchant/lists', [AdminController::class, 'list_merchant'])->name('list.merchant');
    //----------merchant----------

    //----------reseller----------

    Route::get('/dashboard/reseller/lists', [AdminController::class, 'list_reseller'])->name('list.reseller');
    //----------reseller----------

});
//------------------------------------------------------------Admin----------------------------------------------------------------------------------


//------------------------------------------------------------Merchant----------------------------------------------------------------------------------

Route::group(['middleware' => ['auth', 'merchant'],], function () {
    Route::get('/dashboard/merchant', [MerchantController::class, 'index'])->name('merchant');
});
//------------------------------------------------------------Merchant----------------------------------------------------------------------------------


//------------------------------------------------------------Reseller----------------------------------------------------------------------------------

Route::group(['middleware' => ['auth', 'reseller'],], function () {
    Route::get('/dashboard/reseller', [ResellerController::class, 'index'])->name('reseller');
});
//------------------------------------------------------------Reseller----------------------------------------------------------------------------------