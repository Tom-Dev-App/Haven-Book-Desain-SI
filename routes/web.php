<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');
Route::post('/sign-in', [AuthController::class, 'login'])->name('sign-in-process');

Route::get('/sign-up', [AuthController::class, 'signUp'])->name('sign-up');
Route::post('/sign-up', [AuthController::class, 'register'])->name('register');

// User
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/book', [UserBookController::class, 'index'])->name('book');
Route::get('/book/detail/{slug}', [UserBookController::class, 'detail'])->name('book-detail');

Route::get('/profile', [ProfileController::class, 'index'])->name('user-profile');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('update-user-profile');

// Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('update-admin-profile');

Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
Route::get('/manage-user/detail/{id}', [UserController::class, 'detail'])->name('detail-user');
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

// Superadmin
Route::get('/manage-admin', [AdminController::class, 'index'])->name('admin-controller');
