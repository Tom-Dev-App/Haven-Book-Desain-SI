<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Superadmin\AdminController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth
// logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// view login
Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in')->middleware('guest');
// process login
Route::post('/sign-in', [AuthController::class, 'login'])->name('sign-in-process')->middleware('guest');
// view register
Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign-up')->middleware('guest');
// process register
Route::post('/sign-up', [AuthController::class, 'register'])->name('register')->middleware('guest');

// User
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/book', [UserBookController::class, 'index'])->name('book');
Route::get('/book/detail/{slug}', [UserBookController::class, 'detail'])->name('book-detail');

Route::group(['middleware' => ['role:user']], function(){
	Route::get('/book-rents/pay/{slug}', [UserBookController::class, 'pay'])->name('pay');
	Route::post('/book-rents/pay/{id}', [UserBookController::class, 'payNow'])->name('pay-rent');
	Route::get('/bookshelf', [UserBookController::class, 'bookshelf'])->name('bookshelf');
	Route::get('bookshelf/{slug}', [UserBookController::class, 'readBook'])->name('read');
	Route::get('/profile', [ProfileController::class, 'index'])->name('user-profile');
	Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('update-user-profile');
	Route::post('/profile/upload/{id}', [ProfileController::class, 'upload'])->name('upload-user-profile');
	Route::post('/books-activation', [UserBookController::class, 'activateKeys'])->name('activate-keys');
	// Notification
	Route::get('/payment', [NotificationController::class, 'index'])->name('notif');
});


// Admin
Route::group(['middleware' => ['role:admin|superadmin']], function(){
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::post('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('update-admin-profile');

	Route::post('/profile/addBankAccount/{id}', [ProfileController::class, 'addBankAccount'])->name('bank-user-profile');
	Route::GET('/profile/deleteBankAccount/{id}', [ProfileController::class, 'deleteBankAccount'])->name('delete-bank-user-profile');
	Route::post('/dashboard/addBankAccount', [DashboardController::class, 'addBankAccount'])->name('bank-admin-profile');
	Route::GET('/dashboard/deleteBankAccount/{id}', [DashboardController::class, 'deleteBankAccount'])->name('delete-bank-admin-profile');

	Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
	Route::get('/manage-user/detail/{user}', [UserController::class, 'detail'])->name('detail-user');
	Route::get('/manage-user/delete/{id}', [UserController::class, 'delete'])->name('delete-user');

	Route::get('/manage-book', [BookController::class, 'index'])->name('manage-book');
	Route::post('/manage-book', [BookController::class, 'store'])->name('insert-book');
	Route::get('/manage-book/detail/{slug}', [BookController::class, 'detail'])->name('detail-book');
	Route::post('/manage-book/update/{slug}', [BookController::class, 'update'])->name('update-book');
	Route::get('/manage-book/delete/{slug}', [BookController::class, 'delete'])->name('delete-book');

	Route::get('/manage-payment', [PaymentController::class, 'index'])->name('manage-payment');
	Route::get('/manage-payment/detail/{transaction_number}', [PaymentController::class, 'detail'])->name('detail-payment');
	Route::get('/manage-payment/accept/{transaction_number}', [PaymentController::class, 'accPembayaran'])->name('accept-payment');
	Route::get('/manage-payment/reject/{transaction_number}', [PaymentController::class, 'rejectPembayaran'])->name('reject-payment');

	Route::get('/manage-report', [ReportController::class, 'index'])->name('manage-report');
	Route::get('/manage-report/detail/{invoice_number}', [ReportController::class, 'detail'])->name('detail-report');
	Route::get('/manage-report/print/{invoice_number}', [ReportController::class, 'print'])->name('print-report');
});


// Superadmin
Route::group(['middleware' => ['role:superadmin']], function(){
	Route::get('/manage-admin', [AdminController::class, 'index'])->name('manage-admin');
	Route::post('/manage-admin/add', [AdminController::class, 'store'])->name('add-admin');
	Route::get('/manage-admin/detail/{id}', [AdminController::class, 'detail'])->name('detail-admin');
	Route::get('/manage-admin/delete/{id}', [AdminController::class, 'delete'])->name('delete-admin');
});

