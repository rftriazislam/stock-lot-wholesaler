<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Ajax\AjaxController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Merchant\MerchantController;
use App\Http\Controllers\Payment\PaymentController;
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
Route::get('/home', [FrontendController::class, 'index']);

Route::get('/logout-logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/login-cart', [App\Http\Controllers\Auth\LoginController::class, 'logincart'])->name('logincart');

Route::get('/pro-rft-link-{id}', [App\Http\Controllers\Auth\LoginController::class, 'affiliate_link']);


Route::get('/product-view-{id}-{slug}', [FrontendController::class, 'product_view'])->name('product.view');
Route::get('/product-lists-{sid}', [FrontendController::class, 'product_list_subcategory'])->name('product.list.subcategory');
Route::get('/product-ste-lists-{id}', [FrontendController::class, 'product_list_category'])->name('product.list.category');
Route::get('/shop-view-{id}', [FrontendController::class, 'shop_view'])->name('shop.view');
Route::get('/shop-lists', [FrontendController::class, 'shop_lists'])->name('shop.lists');

Route::get('/pre-order', [FrontendController::class, 'pre_order'])->name('pre.order');

Route::get('/dashboard/pre-order/lists', [AdminController::class, 'pre_product_lists'])->name('pre.product.lists');

Route::group(['middleware' => ['auth'],], function () {

    Route::get('/product-cart-page', [FrontendController::class, 'cart_page'])->name('product.cart');
    Route::get('/product-cart-checkout', [FrontendController::class, 'cart_checkout'])->name('cart.checkout');
    Route::post('/payment-product', [PaymentController::class, 'payment'])->name('payment');
    Route::get('/payment-message', [FrontendController::class, 'payment_message'])->name('payment_message');
});


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


    Route::get('/dashboard/slider/add', [AdminController::class, 'add_slider'])->name('add.slider');
    Route::post('/dashboard/slider/save', [AdminController::class, 'save_slider'])->name('save.slider');
    Route::get('/dashboard/slider/lists', [AdminController::class, 'list_slider'])->name('list.slider');
    Route::get('/dashboard/slider/delete/{id}', [AdminController::class, 'delete_slider'])->name('delete.slider');
    Route::get('/dashboard/slider/status/{id}', [AdminController::class, 'status_slider'])->name('status.slider');
    Route::get('/dashboard/slider/edit/{id}', [AdminController::class, 'edit_slider'])->name('edit.slider');
    Route::post('/dashboard/slider/update', [AdminController::class, 'update_slider'])->name('update.slider');

    Route::get('/dashboard/method/add', [AdminController::class, 'add_method'])->name('method.add');
    Route::post('/dashboard/method/save', [AdminController::class, 'save_method'])->name('method.save');
    Route::get('/dashboard/pre-order/add', [AdminController::class, 'pre_add_product'])->name('pre.add.product');

    Route::post('/dashboard/pre-order/save', [AdminController::class, 'save_product'])->name('admin.save.product');
    Route::get('/dashboard/pre-order/lists', [AdminController::class, 'pre_product_lists'])->name('pre.product.lists');
    Route::get('/dashboard/pre-order/edit/{id}', [AdminController::class, 'pre_product_edit'])->name('admin.preorder.edit');
    Route::post('/dashboard/pre-order/update', [AdminController::class, 'preproduct_update'])->name('admin.preproduct.update');



    //----------merchant----------
    Route::get('/dashboard/merchant/lists', [AdminController::class, 'list_merchant'])->name('list.merchant');
    Route::get('/dashboard/merchant/products', [AdminController::class, 'list_merchant_products'])->name('admin.merchant.products');
    Route::get('/dashboard/merchant/product/permission/{id}', [AdminController::class, 'status_merchant_product'])->name('admin.merchant.status.product');


    Route::get('/dashboard/merchant/product/hot-add/{id}', [AdminController::class, 'hot_addproduct'])->name('admin.merchant.hot.addproduct');
    Route::post('/dashboard/merchant/product/hot', [AdminController::class, 'merchant_hot_saveproduct'])->name('admin.merchant.hot.saveproduct');
    Route::get('/dashboard/merchant/product/hot-remove/{id}', [AdminController::class, 'hot_removeproduct'])->name('admin.merchant.hot.removeproduct');



    //----------merchant----------

    //----------reseller----------

    Route::get('/dashboard/reseller/lists', [AdminController::class, 'list_reseller'])->name('list.reseller');
    //----------reseller----------


});
//------------------------------------------------------------Admin----------------------------------------------------------------------------------


//------------------------------------------------------------Merchant----------------------------------------------------------------------------------

Route::group(['middleware' => ['auth', 'merchant'],], function () {
    Route::get('/dashboard/merchant', [MerchantController::class, 'index'])->name('merchant');

    Route::get('/dashboard/merchant/shop/add', [MerchantController::class, 'add_shop'])->name('merchant.add.shop');
    Route::post('/dashboard/merchant/shop/save', [MerchantController::class, 'save_shop'])->name('merchant.save.shop');
    Route::get('/dashboard/merchant/myprofile', [MerchantController::class, 'myprofile'])->name('myprofile');
    Route::post('/dashboard/merchant/profile/update', [MerchantController::class, 'update_profile'])->name('update.profile');

    Route::get('/dashboard/merchant/product/add', [MerchantController::class, 'add_product'])->name('merchant.add.product');
    Route::post('/dashboard/merchant/product/save', [MerchantController::class, 'save_product'])->name('merchant.save.product');
    Route::get('/dashboard/merchant/product/lists', [MerchantController::class, 'list_product'])->name('merchant.list.product');

    Route::get('/dashboard/merchant/product/status/{id}', [MerchantController::class, 'status_product'])->name('merchant.status.product');
    Route::get('/dashboard/merchant/product/delete/{id}', [MerchantController::class, 'delete_product'])->name('merchant.delete.product');
    Route::get('/dashboard/merchant/product/edit/{id}', [MerchantController::class, 'edit_product'])->name('merchant.edit.product');
    Route::post('/dashboard/merchant/product/update', [MerchantController::class, 'update_product'])->name('merchant.product.update');




    Route::get('/dashboard/merchant/payment/method/add', [MerchantController::class, 'payment_method_add'])->name('merchant.payment.method.add');
    Route::post('/dashboard/merchant/payment/method/save', [MerchantController::class, 'save_payment_method'])->name('merchant.payment.method.save');
    Route::get('/dashboard/merchant/payment/method/list', [MerchantController::class, 'list_payment_method'])->name('merchant.payment.method.list');

    Route::get('/dashboard/merchant/withdraw/add', [MerchantController::class, 'merchant_withdraw_add'])->name('merchant.withdraw.add');
    Route::post('/dashboard/merchant/withdraw/save', [MerchantController::class, 'save_withdraw'])->name('merchant.withdraw.save');
    Route::get('/dashboard/merchant/withdraw/list', [MerchantController::class, 'list_withdraw'])->name('merchant.withdraw.list');

    Route::get('/dashboard/merchant/order/list', [MerchantController::class, 'order_list'])->name('merchant.income.order');
    Route::get('/dashboard/merchant/order/single/{id}', [MerchantController::class, 'order_single'])->name('merchant.order.single');
    Route::get('/dashboard/merchant/order/submit/{id}', [MerchantController::class, 'order_complete'])->name('order.submit');
    Route::get('/dashboard/merchant/order/shipping/{id}', [MerchantController::class, 'order_shipping_charge'])->name('order.shipping.charge');
    Route::post('/dashboard/merchant/shipping/save', [MerchantController::class, 'save_shipping'])->name('merchant.save.shipping');

    Route::get('/dashboard/merchant/buy/order/lists', [MerchantController::class, 'buy_order_lists'])->name('merchant.buy.order.list');
    Route::get('/dashboard/merchant/buy/order/single/{id}', [MerchantController::class, 'buy_order_single'])->name('merchant.buy.order.single');
    Route::get('/dashboard/merchant/buy/order/accept/{id}', [MerchantController::class, 'buy_order_complete'])->name('order.buy.accept');

    Route::get('/dashboard/merchant/affiliate', [MerchantController::class, 'affiliate'])->name('merchant.affiliate');
    Route::get('/dashboard/merchant/affiliate/member', [MerchantController::class, 'affiliate_member'])->name('merchant.affiliate.member');
});
//------------------------------------------------------------Merchant----------------------------------------------------------------------------------


//------------------------------------------------------------Reseller----------------------------------------------------------------------------------

Route::group(['middleware' => ['auth', 'reseller'],], function () {
    Route::get('/dashboard/reseller', [ResellerController::class, 'index'])->name('reseller');

    Route::get('/dashboard/reseller/myprofile', [ResellerController::class, 'myprofile'])->name('reseller.profile');
    Route::post('/dashboard/reseller/profile/update', [MerchantController::class, 'update_profile'])->name('reseller.update.profile');
    Route::get('/dashboard/reseller/order/lists', [ResellerController::class, 'order_lists'])->name('reseller.order.list');
    Route::get('/dashboard/reseller/order/single/{id}', [ResellerController::class, 'order_single'])->name('reseller.order.single');
    Route::get('/dashboard/reseller/order/accept/{id}', [ResellerController::class, 'order_complete'])->name('order.accept');

    Route::get('/dashboard/reseller/affiliate', [ResellerController::class, 'affiliate'])->name('affiliate');

    Route::get('/dashboard/reseller/affiliate/member', [ResellerController::class, 'affiliate_member'])->name('reseller.affiliate.member');
});
//------------------------------------------------------------Reseller----------------------------------------------------------------------------------
Route::get('get-subcategory-list', [AjaxController::class, 'subcategory_list'])->name('get-subcategory-list');
Route::post('/add-to-cart-view', [AjaxController::class, 'add_to_cart'])->name('add-to-cart');
Route::post('/show-cart', [AjaxController::class, 'show_cart'])->name('show.cart');
Route::post('/show--update-cart', [AjaxController::class, 'cart_update'])->name('cart_update');
Route::post('/show--removed-cart', [AjaxController::class, 'removed_cart'])->name('removed.cart');
Route::post('/total-item', [AjaxController::class, 'total_item'])->name('total-item');




Route::any('{slug}', [FrontendController::class, 'error'])->name('error');