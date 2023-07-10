<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\UserhasRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    function index()
    {
        $books = Book::all();
        return view('user/books/book', compact('books'));
    }

    function detail($slug)
    {
        $book = Book::where('slug', $slug)->first();

        // return $book;
        return view('user/books/detail', compact('book'));
    }

    public function readBook(Book $slug) {
        // cek book is actived by keys or not
        // tgl input keys + 30 hari
    }

    public function pay($slug) {
        $book = Book::where('slug', $slug)->first();
        $companyAccounts = BankAccount::with(['user.userhasrole', 'bank'])
                ->whereHas('user.userhasrole', function ($query) {
                    $query->where('role_id', UserhasRole::ADMIN);
                })
                ->get();
        $userAccounts = auth()->user()->accountBank()->with('bank')->get();

       return view('User.books.payment', compact('book', 'companyAccounts', 'userAccounts'));
    }

    public function payNow(Request $request) {
        $request->validate([
            'customer_bank_account_id' => 'required|exists:bank_accounts,id',
            'company_bank_account_id' => 'required|exists:bank_accounts,id',
            'image_proof' => 'required|image',
            ]);
        
        $validator = Validator::make($request->all(), [
                    'number_of_month' => 'required|integer|min:1',
                    'pricetag' => 'required|numeric|min:0',
                ]);

        $validator->after(function ($validator) use ($request) {
        $totalPrice = $request->number_of_month * $request->pricetag;
            if ($request->total_price != $totalPrice) {
                $validator->errors()->add('total_price', 'The total price does not match the calculated value.');
            }
        });

        if ($validator->fails()) {
            // Validation failed
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $currentDate = Carbon::now()->format('Y-m-d H:i:s');
        $image_proof = $request->file('image_proof')->store('payments', 'public');
        Transaction::create([
            'transaction_number' => 'TRANSSACTION'.Str::random(32).$currentDate,
            'payment_proof' => $image_proof,
            'bank_company_account_id' => $request->company_bank_account_id,
            'bank_customer_account_id' => $request->customer_bank_account_id,
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'status_id' => TransactionStatus::PENDING,
            'rent_prices' => $request->total_price
            ]);
        
        return Redirect::route('book')->with('success', 'Transaksi Berhasil!');
    }

    public function rents() {

    }
}
