<?php
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerProductController;
use App\Http\Controllers\ManagerTypeProductController;
use App\Http\Controllers\ManagerNewsController;
use App\Http\Controllers\ManagerRoleController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\ManagerUserRoleController;
use App\Http\Controllers\ManagerCustomerController;
use App\Http\Controllers\ManagerSlideController;
use App\Http\Controllers\ManagerVideoController;
use App\Http\Controllers\ManagerBillController;
use App\Http\Controllers\ManagerBillDetailController;
use App\Http\Controllers\ManagerBillStatisticsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Comment_repliesController;
use App\Http\Controllers\HistoryOrderController;

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


Route::get('/trangchu', 
[PageController::class, 'getIndex'])->name('trang-chu');





Route::get('/sanpham',
[PageController::class,'getSanPham'])->name('san-pham');

Route::get('/comment', 
[CommentController::class, 'showComment'])->name('comment');


Route::get('/sanphamtheoloai/{type}',
[PageController::class,'getSanphamTheoLoai'])->name('san-pham-theo-loai');

Route::get('/chitietsanpham/{id}',
[PageController::class,'getChiTietSanpham'])->name('chi-tiet-san-pham');



Route::get('/lienhe',
[PageController::class,'getLienHe'])->name('lien-he');



Route::get('/gioithieu',
[PageController::class,'getGioiThieu'])->name('gioi-thieu');



Route::get('/historyorder',
[HistoryOrderController::class,'getHistoryOrder'])->name('historyorder');



Route::get('/video',
[PageController::class,'getVideo'])->name('video');


Route::get('/addtocart/{id}',
[PageController::class,'getAddCart'])->name('add-to-cart');




Route::get('/deleteitemcart/{id}',
[PageController::class,'getDeleteItemCart'])->name('delete-item-cart');





Route::get('/dat_hang', [PageController::class, 'getCheckout'])->name('dat-hang');


Route::post('/dat_hang',
[PageController::class,'postCheckout'])->name('dat-hang');



Route::get('/login',
[AuthController::class,'getLogin'])->name('login');

Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');


Route::get('/register',
[AuthController::class,'getRegister'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/search',
[PageController::class,'getSearch'])->name('search');



Route::get('/dashboard',
[AdminController::class,'getDashBoard'])->name('dashboard');
Route::get('/manager_products', [ManagerProductController::class, 'getListProduct'])->name('manager_products');
Route::get('/manager_products/create', [ManagerProductController::class, 'create'])->name('manager_products.create');
Route::post('/manager_products/store', [ManagerProductController::class, 'store'])->name('manager_products.store');
Route::get('/manager_products/edit/{id}', [ManagerProductController::class, 'edit'])->name('manager_products.edit');
Route::put('/manager_products/update/{id}', [ManagerProductController::class, 'update'])->name('manager_products.update');
Route::delete('/manager_products/destroy/{id}', [ManagerProductController::class, 'destroy'])->name('manager_products.destroy');
Route::get('/manager_products/search', [ManagerProductController::class, 'search'])->name('manager_products.search');


Route::get('/manager_type_products', [ManagerTypeProductController::class, 'getListTypeProduct'])->name('manager_type_products');
Route::get('/manager_type_products/create', [ManagerTypeProductController::class, 'create'])->name('manager_type_products.create');
Route::post('/manager_type_products/store', [ManagerTypeProductController::class, 'store'])->name('manager_type_products.store');
Route::get('/manager_type_products/edit/{id}', [ManagerTypeProductController::class, 'edit'])->name('manager_type_products.edit');
Route::put('/manager_type_products/update/{id}', [ManagerTypeProductController::class, 'update'])->name('manager_type_products.update');
Route::delete('/manager_type_products/destroy/{id}', [ManagerTypeProductController::class, 'destroy'])->name('manager_type_products.destroy');


Route::get('/manager_news', [ManagerNewsController::class, 'listNew'])->name('manager_news');
Route::get('/manager_news/create', [ManagerNewsController::class, 'create'])->name('manager_news.create');
Route::post('/manager_news/store', [ManagerNewsController::class, 'store'])->name('manager_news.store');
Route::get('/manager_news/edit/{id}', [ManagerNewsController::class, 'edit'])->name('manager_news.edit');
Route::put('/manager_news/update/{id}', [ManagerNewsController::class, 'update'])->name('manager_news.update');
Route::delete('/manager_news/destroy/{id}', [ManagerNewsController::class, 'destroy'])->name('manager_news.destroy');




Route::get('/manager_roles', [ManagerRoleController::class, 'listRole'])->name('manager_roles');
Route::get('/manager_roles/create', [ManagerRoleController::class, 'create'])->name('manager_roles.create');
Route::post('/manager_roles/store', [ManagerRoleController::class, 'store'])->name('manager_roles.store');
Route::get('/manager_roles/edit/{id}', [ManagerRoleController::class, 'edit'])->name('manager_roles.edit');
Route::put('/manager_roles/update/{id}', [ManagerRoleController::class, 'update'])->name('manager_roles.update');
Route::delete('/manager_roles/destroy/{id}', [ManagerRoleController::class, 'destroy'])->name('manager_roles.destroy');




Route::get('/manager_users', [ManagerUserController::class, 'listUser'])->name('manager_users');
Route::get('/manager_users/create', [ManagerUserController::class, 'create'])->name('manager_users.create');
Route::post('/manager_users/store', [ManagerUserController::class, 'store'])->name('manager_users.store');
Route::get('/manager_users/edit/{id}', [ManagerUserController::class, 'edit'])->name('manager_users.edit');
Route::put('/manager_users/update/{id}', [ManagerUserController::class, 'update'])->name('manager_users.update');
Route::delete('/manager_users/destroy/{id}', [ManagerUserController::class, 'destroy'])->name('manager_users.destroy');


Route::get('/manager_role_users', [ManagerUserRoleController::class, 'listUserRole'])->name('manager_role_users');
Route::get('/manager_role_users/create', [ManagerUserRoleController::class, 'create'])->name('manager_role_users.create');
Route::post('/manager_role_users/store', [ManagerUserRoleController::class, 'store'])->name('manager_role_users.store');
Route::get('/manager_role_users/edit/{user_id}/{role_id}', [ManagerUserRoleController::class, 'edit'])->name('manager_role_users.edit');
Route::put('/manager_role_users/update/{user_id}/{role_id}', [ManagerUserRoleController::class, 'update'])->name('manager_role_users.update');
Route::delete('/manager_role_users/{user_id}/{role_id}', [ManagerUserRoleController::class, 'destroy'])->name('manager_role_users.destroy');






Route::get('/manager_customers', [ManagerCustomerController::class, 'ListCustomer'])->name('manager_customers');
Route::get('/manager_customers/create', [ManagerCustomerController::class, 'create'])->name('manager_customers.create');
Route::post('/manager_customers/store', [ManagerCustomerController::class, 'store'])->name('manager_customers.store');
Route::get('/manager_customers/edit/{id}', [ManagerCustomerController::class, 'edit'])->name('manager_customers.edit');
Route::put('/manager_customers/update/{id}', [ManagerCustomerController::class, 'update'])->name('manager_customers.update');
Route::delete('/manager_customers/{id}', [ManagerCustomerController::class, 'destroy'])->name('manager_customers.destroy');
Route::get('/manager_customers/search', [ManagerCustomerController::class, 'search'])->name('manager_customers.search');



Route::get('/manager_slides', [ManagerSlideController::class, 'listSlide'])->name('manager_slides');
Route::get('/manager_slides/create', [ManagerSlideController::class, 'create'])->name('manager_slides.create');
Route::post('/manager_slides/store', [ManagerSlideController::class, 'store'])->name('manager_slides.store');
Route::get('/manager_slides/edit/{id}', [ManagerSlideController::class, 'edit'])->name('manager_slides.edit');
Route::put('/manager_slides/update/{id}', [ManagerSlideController::class, 'update'])->name('manager_slides.update');
Route::delete('/manager_slides/{id}', [ManagerSlideController::class, 'destroy'])->name('manager_slides.destroy');



Route::get('/manager_videos', [ManagerVideoController::class, 'listVideo'])->name('manager_videos');
Route::get('/manager_videos/create', [ManagerVideoController::class, 'create'])->name('manager_videos.create');
Route::post('/manager_videos/store', [ManagerVideoController::class, 'store'])->name('manager_videos.store');
Route::get('/manager_videos/edit/{id}', [ManagerVideoController::class, 'edit'])->name('manager_videos.edit');
Route::put('/manager_videos/update/{id}', [ManagerVideoController::class, 'update'])->name('manager_videos.update');
Route::delete('/manager_videos/{id}', [ManagerVideoController::class, 'destroy'])->name('manager_videos.destroy');



Route::get('/manager_bills', [ManagerBillController::class, 'listBill'])->name('manager_bills');
Route::get('/manager_bills/create', [ManagerBillController::class, 'create'])->name('manager_bills.create');
Route::post('/manager_bills/store', [ManagerBillController::class, 'store'])->name('manager_bills.store');
Route::get('/manager_bills/edit/{id}', [ManagerBillController::class, 'edit'])->name('manager_bills.edit');
Route::put('/manager_bills/update/{id}', [ManagerBillController::class, 'update'])->name('manager_bills.update');
Route::delete('/manager_bills/{id}', [ManagerBillController::class, 'destroy'])->name('manager_bills.destroy');


Route::get('/manager_bill_details', [ManagerBillDetailController::class, 'listBillDetails'])->name('manager_bill_details');
Route::get('/manager_bill_details/create', [ManagerBillDetailController::class, 'create'])->name('manager_bill_details.create');
Route::post('/manager_bill_details/store', [ManagerBillDetailController::class, 'store'])->name('manager_bill_details.store');
Route::get('/manager_bill_details/edit/{id}', [ManagerBillDetailController::class, 'edit'])->name('manager_bill_details.edit');
Route::put('/manager_bill_details/update/{id}', [ManagerBillDetailController::class, 'update'])->name('manager_bill_details.update');
Route::delete('/manager_bill_details/{id}', [ManagerBillDetailController::class, 'destroy'])->name('manager_bill_details.destroy');


Route::get('/manager_bills/statistics', [ManagerBillStatisticsController::class, 'index'])->name('manager_bills.statistics');



Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::post('/comment_reps', [Comment_repliesController::class, 'store'])->name('comment_reps.store');
    Route::delete('/comment_reps/{id}', [Comment_repliesController::class, 'destroy'])->name('comment_reps.destroy');
});




Route::get('/messages/{receiverId}', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages/send', [MessageController::class, 'sendMessage'])->name('messages.send');
Route::get('/messages/get', [MessageController::class, 'getMessages'])->name('messages.get');