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

Route::post('timkiem', 'ProductController@timKiem');
Route::match(['get', 'post'], '/', 'IndexController@index');
Route::get('product/{id}', 'ProductController@products');
Route::get('subcategories/{id}', 'IndexController@subcategories');
Route::get('categories/{id}', 'IndexController@categories');
Route::get('/get-product-stock', 'ProductController@getStock');
// route for login register
Route::match(['get', 'post'], '/userLogin', 'UsersController@userLogin');
Route::match(['get', 'post'], '/userRegister', 'UsersController@userRegister');
// route for logout
Route::match(['get', 'post'], '/userLogout', 'UsersController@logout');
//route for add user

// Route for confirm email
Route::get('/confirm/{code}', 'UsersController@confirmAccount');

//route for add to cart
Route::match(['get', 'post'], 'add-cart', 'CartController@addtoCart');
// route for cart
Route::match(['get', 'post'], 'cart', 'CartController@Cart');
//route for delete cart product
Route::get('cart/delete-product/{id}', 'CartController@deleteCartProduct');
//route for update quantity
Route::get('cart/update-quantity-inc/{id}', 'CartController@updateQuantityInc');
Route::get('cart/update-quantity-dec/{id}', 'CartController@updateQuantityDec');
Route::get('cart/get-product-stock/{id}', 'CartController@getStock');

// Apply coupon code
Route::post('cart/apply-coupon', 'CartController@applyCoupon');
// route for contact
Route::get('/contact', 'IndexController@contact');
// route for about
Route::get('/about', 'IndexController@about');
// route for blog
Route::get('/blog', 'BlogController@blog');


Route::match(['get', 'post'], '/admin', 'AdminController@login')->name('admin_login');


//{1. tao php middleware 'frontLogin' 2.vao kernel add middleware }
// route for middleeware after frontLogin
// dang nhap thi ms coi duoc tk cua mk
Route::group(['middleware' => ['frontLogin']], function () {
    //route for user account
    Route::match(['get', 'post'], '/account', 'UsersController@account');
    Route::match(['get', 'post'], '/change-password', 'UsersController@changePassword');
    Route::match(['get', 'post'], '/change-address', 'UsersController@changeAddress');
    Route::match(['get', 'post'], '/checkout', 'CartController@checkout');
    // Route::match(['get', 'post'], '/order-review', 'CartController@orderReview');
    // Route::match(['get', 'post'], '/place-order', 'CartController@placeOrder');
    Route::get('/thanks', 'CartController@thanks');
    Route::match(['get', 'post'], '/stripe', 'CartController@stripe');
    Route::get('/orders', 'CartController@userOrders');
    Route::get('/orders/{id}', 'CartController@userOrdersDetails');
});

Route::group(['middleware' => ['AdminLogin']], function () {

    Route::match(['get', 'post'], '/admin/user-profile', 'AdminController@changePassword');
    Route::match(['get', 'post'], '/admin/dashboard', 'AdminController@dashboard');

    //category route
    Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/restore-category', 'CategoryController@viewRestoreCategory');
    Route::match(['get', 'post'], '/admin/view-categories', 'CategoryController@viewCategories');
    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::get('admin/update-category-status/{id}', 'CategoryController@updateStatus' );
    Route::get('admin/restore-category-status/{id}', 'CategoryController@restoreStatus' );
    Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
   // Route::get('/admin/update-category-status/{idCategory}','CategoryController@updateStatusNew');


    //product route
    Route::match(['get', 'post'], '/admin/add-product', 'ProductController@addProduct');
    Route::match(['get', 'post'], '/admin/restore-product', 'ProductController@viewRestoreProduct');
    Route::match(['get', 'post'], '/admin/view-products', 'ProductController@viewProducts');
    Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductController@editProduct');
    Route::match(['get', 'post'], '/admin/delete-product/{id}', 'ProductController@deleteProduct');
    Route::match(['get', 'post'], '/admin/discounted-price', 'ProductController@viewDiscountedPrice');
    Route::get('admin/discounted-price-product/{id}/{disPrice}', 'ProductController@discountedPrice' );
    Route::get('admin/restore-product-status/{id}', 'ProductController@restoreStatus' );
    Route::get('admin/update-product-status/{id}', 'ProductController@updateStatus' );
    Route::get('admin/update-feature-product-status/{id}', 'ProductController@updateFeature' );
    Route::get('admin/update-hot-product-status/{id}', 'ProductController@updateHot' );
    Route::get('admin/update-new-product-status/{id}', 'ProductController@updateNew' );


    //Route::post('/admin/update-product-status','ProductController@updateStatusNew');

    //product Attributes
    Route::match(['get', 'post'], '/admin/add-attributes/{id}', 'ProductController@addAttributes');
    Route::get('/admin/delete-attributes/{id}', 'ProductController@deleteAttributes');
    Route::post('/admin/edit-attributes/{id}', 'ProductController@editAttributes');


    //banners route
    Route::match(['get', 'post'], '/admin/banners', 'BannersController@banners');
    Route::match(['get', 'post'], '/admin/add-banner', 'BannersController@addBanner');
    Route::match(['get', 'post'], '/admin/restore-banner', 'BannersController@viewRestoreBanner');
    Route::match(['get', 'post'], '/admin/edit-banner/{id}', 'BannersController@editBanner');
    Route::get('admin/restore-banner-status/{id}', 'BannersController@restoreStatus' );
    Route::get('admin/update-banner-status/{id}', 'BannersController@updateStatus' );
    Route::get('/admin/delete_banner/{id}', 'BannersController@deleteBanner');

    //Coupon route
    Route::match(['get', 'post'], '/admin/add-coupon', 'CouponsController@addCoupon');
    Route::match(['get', 'post'], '/admin/view-coupons', 'CouponsController@viewCoupons');
    Route::match(['get', 'post'], '/admin/edit-coupon/{id}', 'CouponsController@editCoupon');
    Route::get('/admin/delete-coupon/{id}', 'CouponsController@deleteCoupon');
    Route::get('admin/update-coupon-status/{id}', 'CouponsController@updateStatus' );
    Route::match(['get', 'post'], '/admin/restore-coupon', 'CouponsController@viewRestoreCoupon');
    Route::get('admin/restore-coupon-status/{id}', 'CouponsController@restoreStatus' );


    //Orders route
    Route::get('admin/orders', 'OrdersController@viewOrders' );
    Route::get('admin/orders/{id}', 'OrdersController@viewOrdersDetails');
    //update order status
    Route::post('admin/update-order-status', 'OrdersController@updateOrderStatus');
    // Customer route
    Route::get('admin/customers', 'CustomerController@viewCustomers');
    Route::get('admin/update-customer-status/{id}', 'CustomerController@updateStatus' );
    Route::get('/admin/delete-customer/{id}', 'CustomerController@deleteCustomer');

    //Blog route
    Route::match(['get', 'post'], '/admin/view_blogs', 'BlogController@viewBlogs');
    Route::match(['get', 'post'], '/admin/restore-blog', 'BlogController@viewRestoreBlog');
    Route::match(['get', 'post'], '/admin/add_blog', 'BlogController@addBlog');
    Route::get('admin/restore-blog-status/{id}', 'BlogController@restoreStatus' );
    Route::match(['get', 'post'], '/admin/edit_blog/{id}', 'BlogController@editBlog');
    Route::get('admin/update-blog-status/{id}', 'BlogController@updateStatus' );
    Route::get('/admin/delete_blog/{id}', 'BlogController@deleteBlog');


});

Route::get('/logout', 'AdminController@logout');

Route::match(['get', 'post'], '/home', 'IndexController@index');
