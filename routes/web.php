<?php

use Illuminate\Support\Facades\Route;
//FE
use App\Http\Controllers\frontend\SiteController;
use App\Http\Controllers\frontend\LienheController;
use App\Http\Controllers\frontend\GiohangController;
use App\Http\Controllers\frontend\ThanhtoanController;
use App\Http\Controllers\frontend\ThankyouController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\TaikhoanController;



//BE
use App\Http\Controllers\backend\DasboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\MemberController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\LinkController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\OrderdetailController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\AjaxController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\frontend\AuthController;





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

Route::get('/', [SiteController::class, 'index']) -> name('site.home');
Route::get('lien-he', [LienheController::class, 'index']) -> name('contact.index');
Route::get('san-pham', [SiteController::class, 'product']) -> name('site.product');
Route::get('bai-viet', [SiteController::class, 'post']) -> name('site.post');
Route::get('tim-kiem', [SearchController::class, 'handleSearch']) -> name('search.index');
Route::get('gio-hang', [GiohangController::class, 'index']) -> name('cart.index');
Route::get('thanh-toan', [ThanhtoanController::class, 'index']) -> name('payment.index');
Route::get('thank-you', [ThankyouController::class, 'index']) -> name('thankyou.index')->middleware('CheckAccount');
Route::get('tai-khoan', [TaikhoanController::class, 'index']) -> name('account.index')->middleware('CheckAccount');
Route::post('change-account', [TaikhoanController::class, 'changePassword']) -> name('account.change')->middleware('CheckAccount');




//Trang quan ly
Route::prefix('admin')->group(function(){
    Route::get('/', [DasboardController::class, 'index'])->name('dasboard')->middleware('CheckLoginAdmin');
    Route::get('/login', [AuthController::class, 'loginAdmin'])->name('admin.login');
    Route::post('/handlelogin', [AuthController::class, 'handleLoginAdmin'])->name('admin.handlelogin');

    //Quản lý danh mục
    Route::resource('category', CategoryController::class)->middleware('CheckLoginAdmin');
    Route::get('category-trash', [CategoryController::class, 'trash'])->name('category-trash')->middleware('CheckLoginAdmin');
    Route::get('category/{id}/status', [CategoryController::class, 'status'])->name('category.status')->middleware('CheckLoginAdmin');
    Route::get('category/{id}/deltrash', [CategoryController::class, 'deltrash'])->name('category.deltrash')->middleware('CheckLoginAdmin');
    Route::get('category/{id}/retrash', [CategoryController::class, 'retrash'])->name('category.retrash')->middleware('CheckLoginAdmin');

    //Quản lý sản phẩm
    Route::resource('product', ProductController::class)->middleware('CheckLoginAdmin');
    Route::get('product-trash', [ProductController::class, 'trash'])->name('product-trash')->middleware('CheckLoginAdmin');
    Route::get('product/{id}/status', [ProductController::class, 'status'])->name('product.status')->middleware('CheckLoginAdmin');
    Route::get('product/{id}/deltrash', [ProductController::class, 'deltrash'])->name('product.deltrash')->middleware('CheckLoginAdmin');
    Route::get('product/{id}/retrash', [ProductController::class, 'retrash'])->name('product.retrash')->middleware('CheckLoginAdmin');
    //Quản lý bài viết
    Route::resource('post', PostController::class)->middleware('CheckLoginAdmin');
    Route::get('post-trash', [PostController::class, 'trash'])->name('post-trash')->middleware('CheckLoginAdmin');
    Route::get('post/{id}/status', [PostController::class, 'status'])->name('post.status')->middleware('CheckLoginAdmin');
    Route::get('post/{id}/deltrash', [PostController::class, 'deltrash'])->name('post.deltrash')->middleware('CheckLoginAdmin');
    Route::get('post/{id}/retrash', [PostController::class, 'retrash'])->name('post.retrash')->middleware('CheckLoginAdmin');
    // Quản lý trang đơn
    Route::resource('page', PageController::class)->middleware('CheckLoginAdmin');
    Route::get('page-trash', [PageController::class, 'trash'])->name('page-trash')->middleware('CheckLoginAdmin');
    Route::get('page/{id}/status', [PageController::class, 'status'])->name('page.status')->middleware('CheckLoginAdmin');
    Route::get('page/{id}/deltrash', [PageController::class, 'deltrash'])->name('page.deltrash')->middleware('CheckLoginAdmin');
    Route::get('page/{id}/retrash', [PageController::class, 'retrash'])->name('page.retrash')->middleware('CheckLoginAdmin');
    //Quản lý chủ đề
    Route::resource('topic', TopicController::class)->middleware('CheckLoginAdmin');
    Route::get('topic-trash', [TopicController::class, 'trash'])->name('topic-trash')->middleware('CheckLoginAdmin');
    Route::get('topic/{id}/status', [TopicController::class, 'status'])->name('topic.status')->middleware('CheckLoginAdmin');
    Route::get('topic/{id}/deltrash', [TopicController::class, 'deltrash'])->name('topic.deltrash')->middleware('CheckLoginAdmin');
    Route::get('topic/{id}/retrash', [TopicController::class, 'retrash'])->name('topic.retrash')->middleware('CheckLoginAdmin');

    //Quản lý người dùng
    Route::resource('user', UserController::class)->middleware('CheckLoginAdmin');
    Route::get('user-trash', [UserController::class, 'trash'])->name('user-trash')->middleware('CheckLoginAdmin');
    Route::get('user/{id}/status', [UserController::class, 'status'])->name('user.status')->middleware('CheckLoginAdmin');
    Route::get('user/{id}/deltrash', [UserController::class, 'deltrash'])->name('user.deltrash')->middleware('CheckLoginAdmin');
    Route::get('user/{id}/retrash', [UserController::class, 'retrash'])->name('user.retrash')->middleware('CheckLoginAdmin');
    //Quản lý thành viên 
    Route::resource('member', MemberController::class)->middleware('CheckLoginAdmin');
    Route::get('member-trash', [MemberController::class, 'trash'])->name('member-trash')->middleware('CheckLoginAdmin');
    Route::get('member/{id}/status', [MemberController::class, 'status'])->name('member.status')->middleware('CheckLoginAdmin');
    Route::get('member/{id}/deltrash', [MemberController::class, 'deltrash'])->name('member.deltrash')->middleware('CheckLoginAdmin');
    Route::get('member/{id}/retrash', [MemberController::class, 'retrash'])->name('member.retrash')->middleware('CheckLoginAdmin');
    Route::get('member/{id}/role&role={rolename}', [MemberController::class, 'role'])->name('member.role')->middleware('CheckLoginAdmin');

    //Quản lý nhà cung cấp
    Route::resource('supplier', SupplierController::class)->middleware('CheckLoginAdmin');
    Route::get('supplier-trash', [SupplierController::class, 'trash'])->name('supplier-trash')->middleware('CheckLoginAdmin');
    Route::get('supplier/{id}/status', [SupplierController::class, 'status'])->name('supplier.status')->middleware('CheckLoginAdmin');
    Route::get('supplier/{id}/deltrash', [SupplierController::class, 'deltrash'])->name('supplier.deltrash')->middleware('CheckLoginAdmin');
    Route::get('supplier/{id}/retrash', [SupplierController::class, 'retrash'])->name('supplier.retrash')->middleware('CheckLoginAdmin');

    //Quan ly binh luan bai viet
    Route::resource('comment', CommentController::class)->middleware('CheckLoginAdmin');
    Route::get('comment-trash', [CommentController::class, 'trash'])->name('comment-trash')->middleware('CheckLoginAdmin');
    Route::get('comment/{id}/status', [CommentController::class, 'status'])->name('comment.status')->middleware('CheckLoginAdmin');
    Route::get('comment/{id}/deltrash', [CommentController::class, 'deltrash'])->name('comment.deltrash')->middleware('CheckLoginAdmin');
    Route::get('comment/{id}/retrash', [CommentController::class, 'retrash'])->name('comment.retrash')->middleware('CheckLoginAdmin');


     //Quản lý menu
     Route::resource('menu', MenuController::class)->middleware('CheckLoginAdmin');
     Route::get('menu-trash', [MenuController::class, 'trash'])->name('menu-trash')->middleware('CheckLoginAdmin');
     Route::get('menu/{id}/status', [MenuController::class, 'status'])->name('menu.status')->middleware('CheckLoginAdmin');
     Route::get('menu/{id}/deltrash', [MenuController::class, 'deltrash'])->name('menu.deltrash')->middleware('CheckLoginAdmin');
     Route::get('menu/{id}/retrash', [MenuController::class, 'retrash'])->name('menu.retrash')->middleware('CheckLoginAdmin');
    
    
     // Quản lý đơn hàng
    Route::resource('order', OrderController::class)->middleware('CheckLoginAdmin');
    Route::get('order-trash', [OrderController::class, 'trash'])->name('order-trash')->middleware('CheckLoginAdmin');
    Route::get('order/{id}/status', [OrderController::class, 'status'])->name('order.status')->middleware('CheckLoginAdmin');
    Route::get('order/{id}/deltrash', [OrderController::class, 'deltrash'])->name('order.deltrash')->middleware('CheckLoginAdmin');
    Route::get('order/{id}/retrash', [OrderController::class, 'retrash'])->name('order.retrash')->middleware('CheckLoginAdmin');
    Route::get('order/{id}/browse', [OrderController::class, 'browse'])->name('order.browse')->middleware('CheckLoginAdmin');


    //Quản lý chi tiến đơn hàng

    //Quản lý slider
    Route::resource('slider', SliderController::class)->middleware('CheckLoginAdmin');
    Route::get('slider-trash', [SliderController::class, 'trash'])->name('slider-trash')->middleware('CheckLoginAdmin');
    Route::get('slider/{id}/status', [SliderController::class, 'status'])->name('slider.status')->middleware('CheckLoginAdmin');
    Route::get('slider/{id}/deltrash', [SliderController::class, 'deltrash'])->name('slider.deltrash')->middleware('CheckLoginAdmin');
    Route::get('slider/{id}/retrash', [SliderController::class, 'retrash'])->name('slider.retrash')->middleware('CheckLoginAdmin');
});


Route::prefix('ajax')->group(function () {
    Route::post('/loadcomment', [AjaxController::class, 'loadcomment'])->name('ajax.loadcomment');
    Route::post('/sendcomment', [AjaxController::class, 'sendcomment'])->name('ajax.sendcomment');
    Route::post('/loadreview', [AjaxController::class, 'loadreview'])->name('ajax.loadreview');
    Route::post('/sendreview', [AjaxController::class, 'sendreview'])->name('ajax.sendreview');
    Route::post('/sendcart', [AjaxController::class, 'sendcart'])->name('ajax.sendcart');
    Route::post('/products', [AjaxController::class, 'products'])->name('ajax.products');
    Route::post('/search', [AjaxController::class, 'search'])->name('ajax.search');

});


Route::get('/dang-nhap', [AuthController::class, 'formlogin'])->name('site.formlogin')->middleware('CheckLogin');
Route::post('/login', [AuthController::class, 'login'])->name('site.login');
Route::get('/dang-ky', [AuthController::class, 'formregister'])->name('site.formregister');
Route::post('/register', [AuthController::class, 'register'])->name('site.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('site.logout');
Route::get('/quen-mat-khau', [AuthController::class, 'forgot_password'])->name('site.forgotpassword');
Route::post('/forgot-password', [AuthController::class, 'handle_forgot_password'])->name('site.handleforgotpassword');
Route::get('/reset-password/{email}/{token}', [AuthController::class, 'handle_reset_password'])->name('site.handleresetpassword');
Route::post('/reset-password', [AuthController::class, 'reset_password'])->name('site.resetpassword');





Route::get('{slug}', [SiteController::class, 'index'])->name('site.slug');



