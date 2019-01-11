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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMINISTRATOR AUTHENCATION ----------------
     * ---------------------------------------------------------------------
     */
Route::get('admin','AdminController@index')->name('admin.dashboard');


Route::prefix('admin')->group(function ()
{
    /**
     * Gom nhóm các Route cho phần admin
     * URL : domain.com/admin/
     * Route mặc định của Admin
     */
    //Route::get('/')->name('admin.dashboard');
    /**
     * URL : domain.com/admin/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    /**
     * URL : domain.com/admin/register
     * Route trả về view dùng để đăng ký tài khoản admin
     */
    Route::get('register','AdminController@create')->name('admin.register');

    /**
     * URL : domain.com/admin/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 admin từ form POST
     */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /**
     * URL : domain.com/admin/login
     * METHOD : GET
     * Route trả về view đăng nhập admin
     */
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * URL : domain.com/admin/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập admin
     */
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * URL : domain.com/admin/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */

    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN SHOPPING ----------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('shop/category', function ()
    {
        return view('admin.content.shop.category.index');
    });

    Route::get('shop/product', function ()
    {
        return view('admin.content.shop.product.index');
    });

    Route::get('shop/customer', function ()
    {
        return view('admin.content.shop.customer.index');
    });

    Route::get('shop/order', function ()
    {
        return view('admin.content.shop.order.index');
    });

    Route::get('shop/review', function ()
    {
        return view('admin.content.shop.review.index');
    });

    Route::get('shop/brand', function ()
    {
        return view('admin.content.shop.brand.index');
    });

    Route::get('shop/statistic', function ()
    {
        return view('admin.content.shop.statistic.index');
    });

    Route::get('shop/product/order', function ()
    {
        return view('admin.content.shop.product-order.index');
    });
    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN CONTENT -----------------------------
    * ---------------------------------------------------------------------
    */
    Route::get('content/category', function ()
    {
        return view('admin.content.content.category.index');
    });

    Route::get('content/post', function ()
    {
        return view('admin.content.content.post.index');
    });

    Route::get('content/page', function ()
    {
        return view('admin.content.content.page.index');
    });

    Route::get('content/tag', function ()
    {
        return view('admin.content.content.tag.index');
    });

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN MENU --------------------------------
    * ---------------------------------------------------------------------
    */
    Route::get('menu', function ()
    {
        return view('admin.content.menu.index');
    });

    Route::get('menuitems', function ()
    {
        return view('admin.content.menuitems.index');
    });

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN USERS -------------------------------
    * ---------------------------------------------------------------------
    */
    Route::get('users', function ()
    {
        return view('admin.content.users.index');
    });

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN MEDIA -------------------------------
    * ---------------------------------------------------------------------
    */
    Route::get('media', function ()
    {
        return view('admin.content.media.index');
    });

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN SETTINGS ----------------------------
     * ---------------------------------------------------------------------
     */
    Route::get('config', function ()
    {
        return view('admin.content.config.index');
    });

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN NEWSLETTER ----------------------------
     * ---------------------------------------------------------------------
     */
    Route::get('newsletter', function ()
    {
        return view('admin.content.newsletter.index');
    });

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN BANNERS ----------------------------
     * ---------------------------------------------------------------------
     */
    Route::get('banners', function ()
    {
        return view('admin.content.banner.index');
    });

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN CONTACTS ----------------------------
     * ---------------------------------------------------------------------
     */
    Route::get('contacts', function ()
    {
        return view('admin.content.contacts.index');
    });

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN EMAIL ----------------------------
     * ---------------------------------------------------------------------
     */
    Route::get('email/inbox', function ()
    {
        return view('admin.content.email.inbox');
    });

    Route::get('email/draft', function ()
    {
        return view('admin.content.email.draft');
    });

    Route::get('email/send', function ()
    {
        return view('admin.content.email.send');
    });

});

/**
 * Route cho Seller
 */

Route::get('seller','SellerController@index');
    /**
     * Route cho nhà cung cấp sản phẩm (Seller)
     */

Route::prefix('seller')->group(function ()
{
    /**
     * Gom nhóm các Route cho phần Seller
     * URL : domain.com/seller/
     * Route mặc định của Seller
     */
    Route::get('/','SellerController@index')->name('seller.dashboard');

    /**
     * URL : domain.com/seller/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard','SellerController@index')->name('seller.dashboard');

    /**
     * URL : domain.com/seller/register
     * Route trả về view dùng để đăng ký tài khoản Seller
     */
    Route::get('register','SellerController@create')->name('seller.register');

    /**
     * URL : domain.com/seller/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 Seller từ form POST
     */
    Route::post('register','SellerController@store')->name('seller.register.store');

    /**
     * URL : domain.com/seller/login
     * METHOD : GET
     * Route trả về view đăng nhập Seller
     */
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * URL : domain.com/seller/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập Seller
     */
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * URL : domain.com/seller/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */

    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');

});

/**
 * Route cho Shipper
 */

Route::get('shipper','ShipperController@index');
/**
 * Route cho nhà vận chuyển sản phẩm (Shipper)
 */

Route::prefix('shipper')->group(function ()
{
    /**
     * Gom nhóm các Route cho phần Shipper
     * URL : domain.com/shipper/
     * Route mặc định của Shipper
     */
    Route::get('/','ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : domain.com/shipper/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard','ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : domain.com/shipper/register
     * Route trả về view dùng để đăng ký tài khoản Shipper
     */
    Route::get('register','ShipperController@create')->name('shipper.register');

    /**
     * URL : domain.com/shipper/register
     * Phương thức là POST
     * Route dùng để đăng ký 1 Shipper từ form POST
     */
    Route::post('register','ShipperController@store')->name('shipper.register.store');

    /**
     * URL : domain.com/shipper/login
     * METHOD : GET
     * Route trả về view đăng nhập Shipper
     */
    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * URL : domain.com/shipper/login
     * METHOD : POST
     * Route xử lý quá trình đăng nhập Shipper
     */
    Route::post('login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    /**
     * URL : domain.com/shipper/logout
     * METHOD : POST
     * Route dùng để đăng xuất
     */

    Route::post('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');

});
