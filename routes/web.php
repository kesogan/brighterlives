<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/associations', function () {
    return view('associations');
});
Route::get('/association', function () {
    return view('association');
});
Route::get('/about', function () {
    return view('aboutus');
});
Route::get('/contact_us', function () {
    return view('contact_us');
});
Route::get('/assoc_activity', function () {
    return view('assoc_activity');
});
Route::get('/assoc_products', function () {
    return view('assoc_products');
});
Route::get('/assoc_about', function () {
    return view('assoc_about');
});
Route::get('/assoc_contact', function () {
    return view('assoc_contact');
});
Route::get('/single-activity', function () {
    return view('single-activity');
});
Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/rating', 'RatingController@rate');

Auth::routes(['verify' => true]);

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/admin-login', 'Auth\LoginController@getAdminLogin')->name('admin.login');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/customer/donate','CustomerController@makeDonation')->name('customer.make-donation');
Route::get('/customer/place-order','CustomerController@placeOrder')->name('customer.place-order');


/**================Localization routes for language translations=============================== */
Route::get('locale/{locale}/', function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});

Route::group(['prefix' => 'admin',  'middleware'=>['auth']], function() {

    //ActivityLog Management
    Route::get('activitylog', 'Admin\ActivitylogController@getIndex');
    Route::get('datatables/data', 'Admin\ActivitylogController@anyData')->name('datatables.activitylog');
    //Transaction Management
    Route::get('transactionlog', 'Admin\TransactionController@getIndex');
    Route::get('datatables/transactionlog', 'Admin\TransactionController@anyData')->name('datatables.transactionlog');

    //Categories Management
    Route::post('categories', 'Admin\CategoryController@store')->name('admin.category.store');
    Route::get('categories', 'Admin\CategoryController@index')->name('admin.categories.index');
    Route::get('category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
    Route::get('category/show-delete/{id}', 'Admin\CategoryController@showDelete')->name('admin.category.show-delete');
    Route::post('category/update', 'Admin\CategoryController@update')->name('admin.category.update');
    Route::get('category/delete/{category}', 'Admin\CategoryController@destroy')->name('admin.category.delete');
    Route::post('category/restore/{id}', 'Admin\CategoryController@restore')->name('admin.category.restore');
    Route::delete('category/perma_del/{id}', 'Admin\CategoryController@perma_del')->name('admin.category.perma_del');

    //Users Management
    Route::post('users', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('users', 'Admin\UserController@index')->name('admin.users.index');
    Route::get('user/edit/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::get('user/show-delete/{id}', 'Admin\UserController@showDelete')->name('admin.user.show-delete');
    Route::post('user/update', 'Admin\UserController@update')->name('admin.user.update');
    Route::get('user/delete/{id}', 'Admin\UserController@destroy')->name('admin.user.delete');
    Route::post('user/restore/{id}', 'Admin\UserController@restore')->name('admin.user.restore');
    Route::delete('user/perma_del/{id}', 'Admin\UserController@perma_del')->name('admin.user.perma_del');

    //Associations Management
    Route::post('associations', 'Admin\AssociationController@store')->name('admin.association.store');
    Route::get('associations', 'Admin\AssociationController@index')->name('admin.associations.index');
    Route::get('association/edit/{id}', 'Admin\AssociationController@edit')->name('admin.association.edit');
    Route::get('association/show-delete/{id}', 'Admin\AssociationController@showDelete')->name('admin.association.show-delete');
    Route::post('association/update', 'Admin\AssociationController@update')->name('admin.association.update');
    Route::get('association/delete/{association}', 'Admin\AssociationController@destroy')->name('admin.association.delete');
    Route::post('association/restore/{id}', 'Admin\AssociationController@restore')->name('admin.association.restore');
    Route::delete('association/perma_del/{id}', 'Admin\AssociationController@perma_del')->name('admin.association.perma_del');

    //Products Management
    Route::post('products', 'Admin\ProductController@store')->name('admin.product.store');
    Route::get('products', 'Admin\ProductController@index')->name('admin.products.index');
    Route::get('products/create', 'Admin\ProductController@create')->name('admin.products.create');
    Route::get('product/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
    Route::get('product/show/{id}', 'Admin\ProductController@show')->name('admin.product.show');
    Route::post('product/update/{id}', 'Admin\ProductController@update')->name('admin.product.update');
    Route::get('product/delete/{id}', 'Admin\ProductController@destroy')->name('admin.product.delete');
    Route::post('product/restore/{id}', 'Admin\ProductController@restore')->name('admin.product.restore');
    Route::delete('product/perma_del/{id}', 'Admin\ProductController@perma_del')->name('admin.product.perma_del');

    //Activity Management
    Route::post('activities', 'Admin\ActivityController@store')->name('admin.activity.store');
    Route::get('activities', 'Admin\ActivityController@index')->name('admin.activities.index');
    Route::get('activities/create', 'Admin\ActivityController@create')->name('admin.activities.create');
    Route::get('activity/edit/{id}', 'Admin\ActivityController@edit')->name('admin.activity.edit');
    Route::get('activity/show/{id}', 'Admin\ActivityController@show')->name('admin.activity.show');
    Route::post('activity/update/{id}', 'Admin\ActivityController@update')->name('admin.activity.update');
    Route::get('activity/delete/{id}', 'Admin\ActivityController@destroy')->name('admin.activity.delete');
    Route::post('activity/restore/{id}', 'Admin\ActivityController@restore')->name('admin.activity.restore');
    Route::delete('activity/perma_del/{id}', 'Admin\ActivityController@perma_del')->name('admin.activity.perma_del');

});