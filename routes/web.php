<?php

use Illuminate\Support\Facades\Route;

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
//======== website routing =========
Route::get('/', 'WebsiteController@home')->name('web.home');
Route::get('/about', 'WebsiteController@about')->name('web.about');
Route::get('/sourcemap', 'WebsiteController@sourcemap')->name('web.sourcemap');
Route::get('/upcycling', 'WebsiteController@upcycling')->name('web.upcycling');
Route::get('/research', 'WebsiteController@research')->name('web.research');
Route::get('/contact', 'WebsiteController@contact')->name('web.contact');
Route::post('/contact', 'WebsiteController@postContact')->name('web.contact.post');
Route::get('/marketplace', 'WebsiteController@showMarketplace')->name('web.marketplace');

Auth::routes();

//=========== User Verify Account ==========
Route::get('/verify/token/{token}', 'Auth\RegisterController@verifyUser');

Route::prefix('user')->group(function (){
    //=========== Authentication for Users ============
    Route::get('/login','Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('/login','Auth\LoginController@login')->name('user.login.submit');
    Route::get('/reset-password','Auth\ForgotPasswordController@showLinkRequestForm')->name('user.reset.password');
    Route::post('/reset-password','Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.reset.post');

    Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::post('/password/reset','Auth\ResetPasswordController@reset')->name('user.password.reset.post');

    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('/register','Auth\RegisterController@register')->name('user.register.submit');
    Route::get('logout', 'Auth\LoginController@userLogout')->name('user.logout');

    //============ Dashboard ==========
    Route::get('/', 'HomeController@index')->name('user.welcome');

    //*****================= user profile management ======================****
    Route::get('/profile', 'ProfileController@index')->name('user.profile');
    Route::post('/profile/change-password', 'ProfileController@changePassword')->name('user.change.password');
    Route::post('/profile/change-bio', 'ProfileController@updateBio')->name('user.change.bio');
    Route::post('/profile/change-detail', 'ProfileController@updateDetail')->name('user.change.detail');

    //****=========== Farmer Roles ==========**********
    Route::get('/add-farm', 'FarmController@create')->name('user.add.farm');
    Route::get('/add-crop-to-farm', 'FarmController@addCrop')->name('user.add.crop');
    Route::post('/add-farm', 'FarmController@store')->name('user.store.farm');
    Route::post('/add-farm-crop', 'FarmController@storeFarmCrop')->name('user.store.farm.crop');
    Route::get('/view-farm', 'FarmController@index')->name('user.view.farm');
    Route::get('/{farm}/view-farm-crops', 'FarmController@viewCrops')->name('user.view.farm.crop');
    Route::get('/{id}/view-farm-crops-detail', 'FarmController@viewCropDetail')->name('user.detail.farm.crop');

    //========= AGGREGATOR ===========
    Route::get('/add-warehouse','WarehouseController@create')->name('user.add.warehouse');
    Route::post('/add-warehouse','WarehouseController@store')->name('user.store.warehouse');
    Route::get('/view-warehouse','WarehouseController@index')->name('user.view.warehouse');
    Route::get('/view-warehouse/{warehouse}/detail','WarehouseController@details')->name('user.view.warehouse.detail');
    Route::get('/add-crop-to-warehouse/{warehouse}','WarehouseController@addCropToWarehouse')->name('user.warehouse.addCrop');
    Route::post('/add-crop-to-warehouse','WarehouseController@storeFarmCrop')->name('user.warehouse.addCrop.store');
    Route::get('/warehouse-crop-detail/{id}','WarehouseController@warehouseCropDetail')->name('user.warehouse.crop.detail');
    Route::get('/warehouse-crop/{id}/open','WarehouseController@openCropSale')->name('user.warehouse.crop.open');
    Route::get('/warehouse-crop/{id}/close','WarehouseController@closeCropSale')->name('user.warehouse.crop.close');

    //========= PRODUCT ===========
    Route::get('/add-processing-site','ProductController@create')->name('user.add.site');
    Route::get('/add-product','ProductController@createProduct')->name('user.add.product');
    Route::post('/store-site','ProductController@store')->name('user.store.product');
    Route::post('/store-product','ProductController@storeProduct')->name('user.store.processing.product');
    Route::get('/view-product','ProductController@index')->name('user.view.site');
    Route::get('/{product}/view-product','ProductController@viewProducts')->name('user.view.products');

    //=========== OrderList ============
    Route::get('/products','HomeController@orderList')->name('user.view.orderList');
    Route::get('/checkout','HomeController@billing')->name('user.view.billing');
    Route::post('/checkout','HomeController@checkout')->name('user.checkout');
    Route::get('/view-cart','HomeController@cart')->name('user.view.cart');
    Route::get('/remove-cart/{id}','HomeController@removeCart')->name('user.remove.cart');
    Route::post('/update-cart','HomeController@updateCart')->name('user.update.cart');
    Route::get('/product/{id}/order/{type}','HomeController@orderListDetail')->name('user.view.orderList.detail');
    Route::get('/add/{id}/{type}','HomeController@addToCart')->name('user.add.cart');

    //============= User Map ============
    Route::get('/access/map','HomeController@accessMap')->name('user.map');

    Route::post('/review','HomeController@storeReview')->name('user.review.store');

    Route::get('/mark-as-read', 'HomeController@markAsRead')->name('user.mark.notify');
    Route::get('/notifications', 'HomeController@notifications')->name('user.notifications');


    //============= Truckers ============
    Route::get('/create-trucker', 'TruckerController@create')->name('user.add.trucker');
    Route::get('/view-truckers', 'TruckerController@index')->name('user.view.trucker');
    Route::post('/create-trucker', 'TruckerController@store')->name('user.store.trucker');


    // ============== Offer for sale handling =======
    Route::get('{farm}/open-sale-farm', 'HomeController@cropForSale')->name('user.open.sale.farm');
    Route::get('{farm}/close-sale-farm', 'HomeController@cropForSaleClose')->name('user.close.sale.farm');


    Route::get('{product}/open-sale-product', 'HomeController@productForSale')->name('user.open.sale.product');
    Route::get('{product}/close-sale-product', 'HomeController@productForSaleClose')->name('user.close.sale.product');


    Route::get('{warehouse}/close-sale-warehouse', 'HomeController@warehouseForSaleClose')->name('user.close.sale.warehouse');
    Route::get('{warehouse}/open-sale-warehouse', 'HomeController@warehouseForSale')->name('user.open.sale.warehouse');

});

Route::prefix('admin')->group(function (){
    Route::get('/','AdminController@home')->name('admin.dashboard');
    Route::get('/login','Auth\AdminLoginController@userLogin')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@userLogout')->name('admin.logout');

    //======== Product =======
    Route::get('/add-product', 'AdminController@addProduct')->name('admin.add.product');
    Route::get('/add-processing-product', 'AdminController@addProcessingProduct')->name('admin.add.processing.product');
    Route::post('/add-product', 'AdminController@storeProduct')->name('admin.store.product');
    Route::post('/store-processing-product', 'AdminController@storeProcessingProduct')->name('admin.store.processing.product');
    Route::get('/view-products', 'AdminController@viewProduct')->name('admin.view.product');
    Route::get('/{product}/view-products', 'AdminController@viewProcessingProduct')->name('admin.view.processing.product');
    Route::get('/show-products/{product}', 'AdminController@showProduct')->name('admin.show.product');
    Route::get('/hide-products/{product}', 'AdminController@hideProduct')->name('admin.hide.product');
    //======== Warehouse =======
    Route::get('/add-warehouse', 'AdminController@addWarehouse')->name('admin.add.warehouse');
    Route::post('/add-warehouse', 'AdminController@storeWarehouse')->name('admin.store.warehouse');
    Route::get('/view-warehouse', 'AdminController@viewWarehouse')->name('admin.view.warehouse');
    Route::get('/show-warehouse/{id}', 'AdminController@showWarehouse')->name('admin.show.warehouse.crop');
    Route::get('/hide-warehouse/{id}', 'AdminController@hideWarehouse')->name('admin.hide.warehouse.crop');
    Route::get('/view-warehouse/{warehouse}/detail','AdminController@warehouseDetail')->name('admin.view.warehouse.detail');

    Route::get('/add-crop-to-warehouse/{warehouse}','AdminController@addCropToWarehouse')->name('admin.warehouse.addCrop');
    Route::post('/add-crop-to-warehouse','AdminController@warehouseStoreFarmCrop')->name('admin.warehouse.addCrop.store');
    Route::get('/warehouse-crop-detail/{id}','AdminController@warehouseCropDetail')->name('admin.warehouse.crop.detail');

    //======== Farm =======
    Route::get('/add-farm', 'AdminController@addFarm')->name('admin.add.farm');
    Route::get('/add-crop', 'AdminController@addFarmCrop')->name('admin.add.farm.crop');
    Route::post('/add-farm', 'AdminController@storeFarm')->name('admin.store.farm');
    Route::post('/add-farm-crop', 'AdminController@storeFarmCrop')->name('admin.store.farm.crop');
    Route::get('/view-farm', 'AdminController@viewFarm')->name('admin.view.farm');
    Route::get('{farm}/view-farm-crop', 'AdminController@viewFarmCrop')->name('admin.view.farm.crop');
    Route::get('/show-farm/{farm}', 'AdminController@showFarm')->name('admin.show.farm');
    Route::get('/hide-farm/{farm}', 'AdminController@hideFarm')->name('admin.hide.farm');
    Route::get('/{id}/view-farm-crops-detail', 'AdminController@viewCropDetail')->name('admin.detail.farm.crop');

    //========== Users============
    Route::get('/users', 'AdminController@viewUsers')->name('admin.view.users');
    Route::get('/data-entry-users', 'AdminController@dataEntry')->name('admin.view.data-users');
    Route::post('/data-entry-users', 'AdminController@storeEntryUsers')->name('admin.store.data-users');

    Route::get('/information-system', 'AdminController@informationSystem')->name('admin.view.information');
    Route::post('/information-system', 'AdminController@storeUsers')->name('admin.store-users');
    Route::get('/information-system/{userId}/edit', 'AdminController@informationSystemEdit')->name('admin.view.information.edit');
    Route::post('/information-system/store', 'AdminController@informationSystemEditStore')->name('admin.view.information.store');

    Route::get('/suspend-user/{id}', 'AdminController@suspendUser')->name('admin.suspend.user');
    Route::get('/unsuspend-user/{id}', 'AdminController@unsuspendUser')->name('admin.unsuspend.user');
    Route::get('/approve-user/{id}', 'AdminController@approveUser')->name('admin.approve.user');
    //======= Suspend Data Entry User ======
    Route::get('/suspend-admin/{id}', 'AdminController@suspendAdmin')->name('admin.suspend.admin');
    Route::get('/unsuspend-admin/{id}', 'AdminController@unsuspendAdmin')->name('admin.unsuspend.admin');

    //=========== Admin Notification
    Route::get('mark-as-read','AdminController@markAsRead')->name('admin.notification.read');

    //====== Roles =========
    Route::get('roles','AdminController@roles')->name('admin.roles');
    Route::post('role','AdminController@role')->name('admin.roles.submit');
    Route::get('role/{role}','AdminController@roleDelete')->name('admin.roles.delete');

    //====== District ====
    Route::get('districts','DistrictController@getDistricts')->name('admin.districts');
    Route::post('districts/add','DistrictController@addDistricts')->name('admin.districts.submit');
    Route::get('district/{district}','DistrictController@deleteDistrict')->name('admin.districts.delete');


    //============== Waste ============
    Route::get('waste-management','AdminController@addWaste')->name('admin.add.waste');
    Route::post('waste-management','AdminController@postWaste')->name('admin.post.waste');
    Route::get('waste-management/{waste}','AdminController@wasteDelete')->name('admin.delete.waste');

    //============= Crop ============
    Route::get('crop','AdminController@addCrop')->name('admin.add.crop');
    Route::post('crop','AdminController@postCrop')->name('admin.post.crop');
    Route::get('delete-crop/{crop}','AdminController@cropDelete')->name('admin.delete.crop');

    //=========== Truck =========
    Route::resource('trucks','TruckController');
    Route::get('delete-truck/{truck}','Truckcontroller@deleteTruck')->name('admin.truck.delete');
    Route::get('view-truckers','AdminController@viewTruckers')->name('admin.trucker.view');

    //========= Orders ==========
    Route::get('orders','AdminController@orders')->name('admin.orders.view');
    Route::get('orders/{order_id}/detail/{code}','AdminController@orderDetail')->name('admin.orders.detail');
    Route::get('confirm-order/{order}','AdminController@confirmOrder')->name('admin.orders.confirm');
    Route::get('decline-order/{order}','AdminController@declineOrder')->name('admin.orders.decline');

    //====== Profile =====
    Route::get('profile','AdminController@profile')->name('admin.profile');
    Route::post('change-password','AdminController@changePassword')->name('admin.change.password');

    Route::get('/access/map','AdminController@accessMap')->name('admin.map');
});

Route::get('/home', 'HomeController@index')->name('home');
