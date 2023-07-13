<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Book;
use App\Models\BookRent;
use App\Models\Invoice;
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
        $title = "Books";
        return view('user/books/book', compact('books', 'title'));
    }

    public function detail($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $title = $book->title;
        $bankAccounts = BankAccount::where('user_id', Session::get('id'))->get();
        $companyAccounts = BankAccount::with(['user.userhasrole', 'bank'])
            ->whereHas('user.userhasrole', function ($query) {
                $query->where('role_id', UserhasRole::ADMIN);
            })
            ->get();
      
        return view('user/books/detail', compact('book', 'bankAccounts', 'companyAccounts', 'title'));
    }

    public function readBook($slug)
    {
        $book = Book::with('transactions')->where('slug', $slug)->first();
        $transaction_id = $book->transactions()->first()->id;
        $invoice = Invoice::firstWhere('transaction_id', $transaction_id);
        $rent = BookRent::firstWhere('invoice_id', $invoice->id);
        $is_used = $rent->is_used;
        return view('User.books.read', compact('book', 'is_used', 'transaction_id'));
    }


    public function activateKeys(Request $request)
    
    {
        $invoice_id = Invoice::where('transaction_id', $request->transaction_id)->first()->id;
        $rent = BookRent::where('invoice_id', $invoice_id)->first();
        if ($rent && $rent->keys && $rent->keys === $request->keys) {
            $invoice = Invoice::with(['transaction'])->find($invoice_id);
            $month = $invoice->transaction->months;
            $rent->is_used = true;
            $rent->due_date = Carbon::parse($rent->due_date)->addMonths($month);
            $rent->save();
            return redirect()->back()->with("success", "Keys activated successfully.");
        }

        return redirect()->back()->with("error", "The keys you entered don't match.");
    }


    public function pay($slug)
    {
        $title = 'Rent Payment';
        $book = Book::where('slug', $slug)->first();
        $companyAccounts = BankAccount::with(['user.userhasrole', 'bank'])
            ->whereHas('user.userhasrole', function ($query) {
                $query->where('role_id', UserhasRole::ADMIN);
            })
            ->get();
        $userAccounts = auth()->user()->accountBank()->with('bank')->get();

        return view('User.books.payment', compact('book', 'companyAccounts', 'userAccounts', 'title'));
    }

    public function payNow(Request $request, $id)
    {
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $currentDate = Carbon::now()->format('Y-m-d H:i:s');
        $image_proof = $request->file('image_proof')->store('payments', 'public');
        Transaction::create([
            'transaction_number' => 'TRANSACTION|' . $currentDate,
            'payment_proof' => $image_proof,
            'bank_company_account_id' => $request->company_bank_account_id,
            'bank_customer_account_id' => $request->customer_bank_account_id,
            'user_id' => auth()->user()->id,
            'book_id' => $id,
            'status_id' => TransactionStatus::PENDING,
            'rent_prices' => $request->total_price,
            'months' => $request->number_of_month,

        ]);

        return Redirect::route('notif')->with('success', 'Transaksi Berhasil!');
    }

    public function bookshelf()
    {   
        $title = 'My Books';
        $transactions = Transaction::with(['book'])
            ->where('user_id', Auth::id())
            ->where('status_id', TransactionStatus::SUCCESS)
            ->get();

        $books = $transactions->map(fn ($transaction) => $transaction->book ?? null)->filter();
        return view('User.books.bookshelf', compact('books', 'title'));
    }
}
