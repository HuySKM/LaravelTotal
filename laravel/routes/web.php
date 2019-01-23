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
    return view('frontend.homepages.index');
    });

    Auth::routes(['verify' => true]);
    Route::get('profile', function () {
    // Only verified users may enter...
    })->middleware('verified');

    Route::get('/home', 'HomeController@index')->name('home');

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN AUTHENCATION ------------------------
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

    Route::get('shop/category', 'Admin\ShopCategoryController@index');
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete');

    Route::post('shop/category', 'Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}', 'Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete', 'Admin\ShopCategoryController@destroy');

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN SHOPPING PRODUCT --------------------
     * ---------------------------------------------------------------------
     */

    Route::get('shop/product', 'Admin\ShopProductController@index');
    Route::get('shop/product/create', 'Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete');

    Route::post('shop/product', 'Admin\ShopProductController@store');
    Route::post('shop/product/{id}', 'Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete', 'Admin\ShopProductController@destroy');

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN SHOPPING PRODUCT ORDER --------------
     * ---------------------------------------------------------------------
     */

    Route::get('shop/product/order', function () {
            return view('admin.content.shop.product-order.index');
    });

    /*Route::get('shop/product/order', 'Admin\ShopProductOrderController@index');
      Route::get('shop/product/order/create', 'Admin\ShopProductOrderController@create');
      Route::get('shop/product/order/{id}/edit', 'Admin\ShopProductOrderController@edit');
      Route::get('shop/product/order/{id}/delete', 'Admin\ShopProductOrderController@delete');

      Route::post('shop/product/order', 'Admin\ShopProductOrderController@store');
      Route::post('shop/product/order/{id}', 'Admin\ShopProductOrderController@update');
      Route::post('shop/product/order/{id}/delete', 'Admin\ShopProductOrderController@destroy');*/

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN SHOPPING CUSTOMER -------------------
    * ---------------------------------------------------------------------
    */

    Route::get('shop/customer', function () {
            return view('admin.content.shop.customer.index');
    });

    /*Route::get('shop/customer', 'Admin\ShopCustomerController@index');
    Route::get('shop/customer/create', 'Admin\ShopCustomerController@create');
    Route::get('shop/customer/{id}/edit', 'Admin\ShopCustomerController@edit');
    Route::get('shop/customer/{id}/delete', 'Admin\ShopCustomerController@delete');

    Route::post('shop/customer', 'Admin\ShopCustomerController@store');
    Route::post('shop/customer/{id}', 'Admin\ShopCustomerController@update');
    Route::post('shop/customer/{id}/delete', 'Admin\ShopCustomerController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN SHOPPING ORDER ----------------------
     * ---------------------------------------------------------------------
     */
    Route::get('shop/order', function () {
            return view('admin.content.shop.order.index');
    });

    /*Route::get('shop/order', 'Admin\ShopOrderController@index');
    Route::get('shop/order/create', 'Admin\ShopOrderController@create');
    Route::get('shop/order/{id}/edit', 'Admin\ShopOrderController@edit');
    Route::get('shop/order/{id}/delete', 'Admin\ShopOrderController@delete');

    Route::post('shop/order', 'Admin\ShopOrderController@store');
    Route::post('shop/order/{id}', 'Admin\ShopOrderController@update');
    Route::post('shop/order/{id}/delete', 'Admin\ShopOrderController@destroy');*/

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN SHOPPING REVIEW ---------------------
    * ---------------------------------------------------------------------
    */

    Route::get('shop/review', function () {
            return view('admin.content.shop.review.index');
    });

    /*Route::get('shop/review', 'Admin\ShopReviewController@index');
    Route::get('shop/review/create', 'Admin\ShopReviewController@create');
    Route::get('shop/review/{id}/edit', 'Admin\ShopReviewController@edit');
    Route::get('shop/review/{id}/delete', 'Admin\ShopReviewController@delete');

    Route::post('shop/review', 'Admin\ShopReviewController@store');
    Route::post('shop/review/{id}', 'Admin\ShopReviewController@update');
    Route::post('shop/review/{id}/delete', 'Admin\ShopReviewController@destroy');*/

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN SHOPPING BRAND ----------------------
    * ---------------------------------------------------------------------
    */

    Route::get('shop/brand', function () {
            return view('admin.content.shop.brand.index');
    });

    /*Route::get('shop/brand', 'Admin\ShopBrandController@index');
    Route::get('shop/brand/create', 'Admin\ShopBrandController@create');
    Route::get('shop/brand/{id}/edit', 'Admin\ShopBrandController@edit');
    Route::get('shop/brand/{id}/delete', 'Admin\ShopBrandController@delete');

    Route::post('shop/brand', 'Admin\ShopBrandController@store');
    Route::post('shop/brand/{id}', 'Admin\ShopBrandController@update');
    Route::post('shop/brand/{id}/delete', 'Admin\ShopBrandController@destroy');*/

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN SHOPPING STATISTIC ------------------
    * ---------------------------------------------------------------------
    */

    Route::get('shop/statistic', function () {
            return view('admin.content.shop.statistic.index');
    });

    /*Route::get('shop/statistic', 'Admin\ShopStatisticController@index');
    Route::get('shop/statistic/create', 'Admin\ShopStatisticController@create');
    Route::get('shop/statistic/{id}/edit', 'Admin\ShopStatisticController@edit');
    Route::get('shop/statistic/{id}/delete', 'Admin\ShopStatisticController@delete');

    Route::post('shop/statistic', 'Admin\ShopStatisticController@store');
    Route::post('shop/statistic/{id}', 'Admin\ShopStatisticController@update');
    Route::post('shop/statistic/{id}/delete', 'Admin\ShopStatisticController@destroy');*/

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN CONTENT -----------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('content/category', 'Admin\ContentCategoryController@index');
    Route::get('content/category/create', 'Admin\ContentCategoryController@create');
    Route::get('content/category/{id}/edit', 'Admin\ContentCategoryController@edit');
    Route::get('content/category/{id}/delete', 'Admin\ContentCategoryController@delete');

    Route::post('content/category', 'Admin\ContentCategoryController@store');
    Route::post('content/category/{id}', 'Admin\ContentCategoryController@update');
    Route::post('content/category/{id}/delete', 'Admin\ContentCategoryController@destroy');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN CONTENT POST ------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('content/post', 'Admin\ContentPostController@index');
    Route::get('content/post/create', 'Admin\ContentPostController@create');
    Route::get('content/post/{id}/edit', 'Admin\ContentPostController@edit');
    Route::get('content/post/{id}/delete', 'Admin\ContentPostController@delete');

    Route::post('content/post', 'Admin\ContentPostController@store');
    Route::post('content/post/{id}', 'Admin\ContentPostController@update');
    Route::post('content/post/{id}/delete', 'Admin\ContentPostController@destroy');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN CONTENT PAGE ------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('content/page', 'Admin\ContentPageController@index');
    Route::get('content/page/create', 'Admin\ContentPageController@create');
    Route::get('content/page/{id}/edit', 'Admin\ContentPageController@edit');
    Route::get('content/page/{id}/delete', 'Admin\ContentPageController@delete');

    Route::post('content/page', 'Admin\ContentPageController@store');
    Route::post('content/page/{id}', 'Admin\ContentPageController@update');
    Route::post('content/page/{id}/delete', 'Admin\ContentPageController@destroy');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN CONTENT TAG -------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('content/tag', 'Admin\ContentTagController@index');
    Route::get('content/tag/create', 'Admin\ContentTagController@create');
    Route::get('content/tag/{id}/edit', 'Admin\ContentTagController@edit');
    Route::get('content/tag/{id}/delete', 'Admin\ContentTagController@delete');

    Route::post('content/tag', 'Admin\ContentTagController@store');
    Route::post('content/tag/{id}', 'Admin\ContentTagController@update');
    Route::post('content/tag/{id}/delete', 'Admin\ContentTagController@destroy');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN MENU --------------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('menu', 'Admin\MenuController@index');
    Route::get('menu/create', 'Admin\MenuController@create');
    Route::get('menu/{id}/edit', 'Admin\MenuController@edit');
    Route::get('menu/{id}/delete', 'Admin\MenuController@delete');

    Route::post('menu', 'Admin\MenuController@store');
    Route::post('menu/{id}', 'Admin\MenuController@update');
    Route::post('menu/{id}/delete', 'Admin\MenuController@destroy');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN MENU - ITEMS ------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('menuitems', 'Admin\MenuItemsController@index');
    Route::get('menuitems/create', 'Admin\MenuItemsController@create');
    Route::get('menuitems/{id}/edit', 'Admin\MenuItemsController@edit');
    Route::get('menuitems/{id}/delete', 'Admin\MenuItemsController@delete');

    Route::post('menuitems', 'Admin\MenuItemsController@store');
    Route::post('menuitems/{id}', 'Admin\MenuItemsController@update');
    Route::post('menuitems/{id}/delete', 'Admin\MenuItemsController@destroy');

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN USERS -------------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('users', function () {
            return view('admin.content.users.index');
    });
    /*Route::get('users', 'Admin\UserController@index');
    Route::get('users/create', 'Admin\UserController@create');
    Route::get('users/{id}/edit', 'Admin\UserController@edit');
    Route::get('users/{id}/delete', 'Admin\UserController@delete');

    Route::post('users', 'Admin\UserController@store');
    Route::post('users/{id}', 'Admin\UserController@update');
    Route::post('users/{id}/delete', 'Admin\UserController@destroy');*/

    /**
    * ---------------------------------------------------------------------
    * ------------------- ROUTE ADMIN MEDIA -------------------------------
    * ---------------------------------------------------------------------
    */

    Route::get('media', function () {
            return view('admin.content.media.index');
    });
    /*Route::get('media', 'Admin\MediaController@index');
    Route::get('media/create', 'Admin\MediaController@create');
    Route::get('media/{id}/edit', 'Admin\MediaController@edit');
    Route::get('media/{id}/delete', 'Admin\MediaController@delete');

    Route::post('media', 'Admin\MediaController@store');
    Route::post('media/{id}', 'Admin\MediaController@update');
    Route::post('media/{id}/delete', 'Admin\MediaController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN GLOBAL SETTINGS ---------------------
     * ---------------------------------------------------------------------
     */

    Route::get('config', 'Admin\ConfigController@index');
    Route::post('config', 'Admin\ConfigController@store');

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN NEWSLETTER --------------------------
     * ---------------------------------------------------------------------
     */

    Route::get('newsletter', function () {
            return view('admin.content.newsletter.index');
    });
    /*Route::get('newsletter', 'Admin\NewsLetterController@index');
    Route::get('newsletter/create', 'Admin\NewsLetterController@create');
    Route::get('newsletter/{id}/edit', 'Admin\NewsLetterController@edit');
    Route::get('newsletter/{id}/delete', 'Admin\NewsLetterController@delete');

    Route::post('newsletter', 'Admin\NewsLetterController@store');
    Route::post('newsletter/{id}', 'Admin\NewsLetterController@update');
    Route::post('newsletter/{id}/delete', 'Admin\NewsLetterController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN BANNERS -----------------------------
     * ---------------------------------------------------------------------
     */

    Route::get('banner', function () {
            return view('admin.content.banner.index');
    });
    /*Route::get('banners', 'Admin\BannerController@index');
    Route::get('banners/create', 'Admin\BannerController@create');
    Route::get('banners/{id}/edit', 'Admin\BannerController@edit');
    Route::get('banners/{id}/delete', 'Admin\BannerController@delete');

    Route::post('banners', 'Admin\BannerController@store');
    Route::post('banners/{id}', 'Admin\BannerController@update');
    Route::post('banners/{id}/delete', 'Admin\BannerController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN CONTACTS ----------------------------
     * ---------------------------------------------------------------------
     */

    Route::get('contacts', function () {
            return view('admin.content.contacts.index');
    });
    /*Route::get('contacts', 'Admin\ContactController@index');
    Route::get('contacts/create', 'Admin\ContactController@create');
    Route::get('contacts/{id}/edit', 'Admin\ContactController@edit');
    Route::get('contacts/{id}/delete', 'Admin\ContactController@delete');

    Route::post('contacts', 'Admin\ContactController@store');
    Route::post('contacts/{id}', 'Admin\ContactController@update');
    Route::post('contacts/{id}/delete', 'Admin\ContactController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN EMAIL -------------------------------
     * ---------------------------------------------------------------------
     */

    Route::get('email/inbox', function () {
            return view('admin.content.email.inbox');
    });
    /*Route::get('email/inbox', 'Admin\EmailInboxController@index');
    Route::get('email/inbox/create', 'Admin\EmailInboxController@create');
    Route::get('email/inbox/{id}/edit', 'Admin\EmailInboxController@edit');
    Route::get('email/inbox/{id}/delete', 'Admin\EmailInboxController@delete');

    Route::post('email/inbox', 'Admin\EmailInboxController@store');
    Route::post('email/inbox/{id}', 'Admin\EmailInboxController@update');
    Route::post('email/inbox/{id}/delete', 'Admin\EmailInboxController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN EMAIL DRAFT -------------------------
     * ---------------------------------------------------------------------
     */

    Route::get('email/draft', function () {
            return view('admin.content.email.draft');
    });
    /*Route::get('email/draft', 'Admin\EmailDraftController@index');
    Route::get('email/draft/create', 'Admin\EmailDraftController@create');
    Route::get('email/draft/{id}/edit', 'Admin\EmailDraftController@edit');
    Route::get('email/draft/{id}/delete', 'Admin\EmailDraftController@delete');

    Route::post('email/draft', 'Admin\EmailDraftController@store');
    Route::post('email/draft/{id}', 'Admin\EmailDraftController@update');
    Route::post('email/draft/{id}/delete', 'Admin\EmailDraftController@destroy');*/

    /**
     * ---------------------------------------------------------------------
     * ------------------- ROUTE ADMIN EMAIL SEND --------------------------
     * ---------------------------------------------------------------------
     */

    Route::get('email/send', function () {
            return view('admin.content.email.send');
    });
    /*Route::get('email/send', 'Admin\EmailSendController@index');
    Route::get('email/send/create', 'Admin\EmailSendController@create');
    Route::get('email/send/{id}/edit', 'Admin\EmailSendController@edit');
    Route::get('email/send/{id}/delete', 'Admin\EmailSendController@delete');

    Route::post('email/send', 'Admin\EmailSendController@store');
    Route::post('email/send/{id}', 'Admin\EmailSendController@update');
    Route::post('email/send/{id}/delete', 'Admin\EmailSendController@destroy');*/

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
