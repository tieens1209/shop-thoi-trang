<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminBillController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminVoucherController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/list-product', [HomeController::class, 'listProduct'])->name('listProduct');
Route::get('/detail-product/{id}', [HomeController::class, 'detailProduct'])->name('detailProduct');
Route::get('/list-product-by-category/{id}', [HomeController::class, 'listProductByCategory'])->name('listProductByCategory');
Route::get('/search-product', [HomeController::class, 'searchProduct'])->name('searchProduct');

//Login 
Route::get('/login', [AccountController::class, 'getFormLogin'])->name('login');
Route::post('/login', [AccountController::class, 'submitFormLogin'])->name('login');
//Register
Route::get('/register', [AccountController::class, 'getFormRegister'])->name('register');
Route::post('/register', [AccountController::class, 'submitFormRegister'])->name('register');
//Logout
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
//Forgot password
Route::get('/forgot-password', [AccountController::class, 'getFormForgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [AccountController::class, 'submitFormForgotPassword'])->name('forgotPassword');
Route::get('/new-password/{id}/{token}', [AccountController::class, 'getFormNewPassword'])->name('newPassword');
Route::post('/change-password/{id}', [AccountController::class, 'submitFormNewPassword'])->name('changePassword');
//Verification email
Route::get('/verifi-email/{email}/{token}', [AccountController::class, 'verifiEmail'])->name('verifiEmail');
// Order
Route::group(['middleware' => 'auth'], function () {
    //Cart

    Route::post('/add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');
    Route::get('/view-cart', [OrderController::class, 'viewCart'])->name('viewCart');
    Route::get('/delete-product-in-cart/{id}', [OrderController::class, 'deleteInCart'])->name('deleteInCart');
    Route::post('/update-cart', [OrderController::class, 'updateCart'])->name('updateCart');
    //Coupon
    Route::post('/discount-code', [OrderController::class, 'discountCode'])->name('discountCode');
    //Checkout (with VNPay)
    Route::get('/check-out', [OrderController::class, 'getFormCheckOut'])->name('checkOut');
    Route::post('/check-out', [OrderController::class, 'submitFormCheckOut'])->name('checkOut');
    Route::get('/complete-payment', [OrderController::class, 'completePayment'])->name('completePayment');
    //Order list
    Route::get('/order', [OrderController::class, 'listOrder'])->name('listOrder');
    Route::get('/order-detail/{id}', [OrderController::class, 'detailOrder'])->name('detailOrder');
});

//Blog
Route::get('/list-blog', [BlogController::class, 'index'])->name('listBlog');
Route::get('/blog-detail/{blog}', [BlogController::class, 'show'])->name('detailBlog');

Route::get('/wishlist', function () {
    return view('client.page.wishlist');
})->name('wishlist');

Route::get('/faq', function () {
    return view('client.page.faq');
})->name('faq');

Route::get('/about', function () {
    return view('client.page.about');
})->name('about');

Route::get('/contact', function () {
    return view('client.page.contact');
})->name('contact');

Route::get('/cart', function () {
    return view('client.page.cart');
})->name('cart');

Route::get('/shop', function () {
    return view('client.page.shop');
})->name('shop');

Route::get('/blog', function () {
    return view('client.page.blog');
})->name('blog');





//Login admin
Route::get('admin/login', [AdminAccountController::class, 'getFormLogin'])->name('adminLogin');
Route::post('admin/login', [AdminAccountController::class, 'submitFormLogin'])->name('adminLogin');
//Logout admin
Route::post('admin/logout', [AdminAccountController::class, 'submitFormLogout'])->name('adminLogout');
//admin
// Route::prefix('admin')->name('admin.')->group(function () {
Route::group(['prefix' => 'admin', 'middleware' => 'AdminLogin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.page.home');
    })->name('home');
    Route::get('/account', function () {
        return view('admin.page.account');
    })->name('account');
    // Category
    Route::controller(AdminCategoryController::class)
        ->name('category.')
        ->prefix('category/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{category}', 'edit')->name('edit');
            Route::put('update/{category}', 'update')->name('update');
            Route::delete('destroy/{category}', 'destroy')->name('destroy');
            Route::get('category-restore/{id}', 'restore')->name('restore');
        });

    // Product
    Route::controller(AdminProductController::class)
        ->name('product.')
        ->prefix('product/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{product}', 'edit')->name('edit');
            Route::put('update/{product}', 'update')->name('update');
            Route::delete('destroy/{product}', 'destroy')->name('destroy');
            Route::get('category-restore/{id}', 'restore')->name('restore');
        });
    // Banner
    Route::controller(AdminBannerController::class)
        ->name('banner.')
        ->prefix('banner/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{banner}', 'edit')->name('edit');
            Route::put('update/{banner}', 'update')->name('update');
            Route::delete('destroy/{banner}', 'destroy')->name('destroy');
        });
    // Account
    Route::controller(AdminAccountController::class)
        ->name('account.')
        ->prefix('account/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{account}', 'edit')->name('edit');
            Route::put('update/{account}', 'update')->name('update');
            Route::delete('destroy/{account}', 'destroy')->name('destroy');
            Route::get('create-staff', 'getFormCreateStaff')->name('createStaff');
            Route::post('create-staff', 'submitFormCreateStaff')->name('createStaff');
            Route::get('account-unblock/{id}', 'unblock')->name('unblock');
        });
    // Voucher
    Route::controller(AdminVoucherController::class)
        ->name('voucher.')
        ->prefix('voucher/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{voucher}', 'edit')->name('edit');
            Route::put('update/{voucher}', 'update')->name('update');
            Route::delete('destroy/{voucher}', 'destroy')->name('destroy');
        });

    Route::controller(AdminBlogController::class)
        ->name('blog.')
        ->prefix('blog/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{blog}', 'edit')->name('edit');
            Route::put('update/{blog}', 'update')->name('update');
            Route::delete('destroy/{blog}', 'destroy')->name('destroy');
            Route::get('blog-restore/{id}', 'restore')->name('restore');
        });
    Route::controller(AdminBillController::class)
        ->name('bill.')
        ->prefix('bill/')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('detail/{id}', 'detailBill')->name('detail');
            Route::post('update/{id}', 'updateBill')->name('update');
            Route::get('invoice/{id}', 'invoice')->name('invoice');
            
        });
});
