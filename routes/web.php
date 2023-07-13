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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in')->middleware('guest');
Route::post('/sign-in', [AuthController::class, 'login'])->name('sign-in-process')->middleware('guest');

Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign-up')->middleware('guest');
Route::post('/sign-up', [AuthController::class, 'register'])->name('register')->middleware('guest');

// User
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/book', [UserBookController::class, 'index'])->name('book');
Route::get('/book/detail/{slug}', [UserBookController::class, 'detail'])->name('book-detail');
Route::get('/book-rents/pay/{slug}', [UserBookController::class, 'pay'])->name('pay')->middleware('auth');
Route::post('/book-rents/pay/{id}', [UserBookController::class, 'payNow'])->name('pay-rent')->middleware('auth');
Route::get('/bookshelf', [UserBookController::class, 'bookshelf'])->name('bookshelf')->middleware('auth');
Route::get('bookshelf/{slug}', [UserBookController::class, 'readBook'])->name('read')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->name('user-profile')->middleware('auth');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('update-user-profile')->middleware('auth');
Route::post('/profile/upload/{id}', [ProfileController::class, 'upload'])->name('upload-user-profile')->middleware('auth');
Route::post('/books-activation', [UserBookController::class, 'activateKeys'])->name('activate-keys')->middleware('auth');

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('update-admin-profile')->middleware('auth');

Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user')->middleware('auth');
Route::get('/manage-user/detail/{id}', [UserController::class, 'detail'])->name('detail-user')->middleware('auth');
Route::get('/manage-user/delete/{id}', [UserController::class, 'delete'])->name('delete-user')->middleware('auth');

Route::get('/manage-book', [BookController::class, 'index'])->name('manage-book')->middleware('auth');
Route::post('/manage-book', [BookController::class, 'store'])->name('insert-book')->middleware('auth');
Route::get('/manage-book/detail/{slug}', [BookController::class, 'detail'])->name('detail-book')->middleware('auth');
Route::post('/manage-book/update/{slug}', [BookController::class, 'update'])->name('update-book')->middleware('auth');
Route::get('/manage-book/delete/{slug}', [BookController::class, 'delete'])->name('delete-book')->middleware('auth');

Route::get('/manage-payment', [PaymentController::class, 'index'])->name('manage-payment')->middleware('auth');
Route::get('/manage-payment/detail/{transaction_number}', [PaymentController::class, 'detail'])->name('detail-payment')->middleware('auth');
Route::get('/manage-payment/accept/{transaction_number}', [PaymentController::class, 'accPembayaran'])->name('accept-payment')->middleware('auth');
Route::get('/manage-payment/reject/{transaction_number}', [PaymentController::class, 'rejectPembayaran'])->name('reject-payment')->middleware('auth');

Route::get('/manage-report', [ReportController::class, 'index'])->name('manage-report')->middleware('auth');
Route::get('/manage-report/detail/{invoice_number}', [ReportController::class, 'detail'])->name('detail-report')->middleware('auth');
Route::get('/manage-report/print/{invoice_number}', [ReportController::class, 'print'])->name('print-report')->middleware('auth');

// Notification
Route::get('/payment', [NotificationController::class, 'index'])->name('notif')->middleware('auth');

// Superadmin
Route::get('/manage-admin', [AdminController::class, 'index'])->name('manage-admin')->middleware('auth');
Route::post('/manage-admin/add', [AdminController::class, 'store'])->name('add-admin')->middleware('auth');
Route::get('/manage-admin/detail/{id}', [AdminController::class, 'detail'])->name('detail-admin')->middleware('auth');
Route::get('/manage-admin/delete/{id}', [AdminController::class, 'delete'])->name('delete-admin')->middleware('auth');
