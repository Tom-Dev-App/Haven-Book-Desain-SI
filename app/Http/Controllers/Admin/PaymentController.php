<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\BookRent;
use App\Models\Invoice;
use App\Models\TransactionStatus;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    function index()
    {

            $userId = Auth::id();

            $transactions = Transaction::with([
                'companyBank.user',
                'book',
                'status',
                'customerBank.bank',
                'companyBank.bank'
            ])
                ->whereHas('companyBank', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->orderBy('id', 'desc')
                ->get();

            $cardholders = BankAccount::with('bank', 'user')->where('user_id', $userId)->get();
            return view('Admin/payment/manage-payment', compact('transactions', 'cardholders'));
    }

    function detail($transaction_number)
    {
            $userId = Auth::id();

            $transaction = Transaction::with([
                'companyBank.user',
                'book',
                'status',
                'customerBank.bank',
                'customerBank.user',
                'companyBank.bank'
            ])
                ->whereHas('companyBank', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->where('transaction_number', $transaction_number)->first();


            return view('Admin/payment/payment-verification-detail', compact('transaction'));
    }

    function accPembayaran($transaction_number)
    {
        $transaction = Transaction::with(
            'user',
            'book',
            'status',
        )->where('transaction_number', $transaction_number)->first();

        $transaction->status_id = TransactionStatus::SUCCESS;
        $transaction->admin_id = Auth::id();

        $invoice = new Invoice();

        $invoice->invoice_number = uniqid() . random_int(PHP_INT_MIN, PHP_INT_MAX);
        $invoice->transaction_id = $transaction->id;

        $bookRent = new BookRent();

        $invoice->save();
        $transaction->save();

        $bookRent->user_id = $transaction->user->id;
        $bookRent->book_id = $transaction->book->id;
        $bookRent->invoice_id = $invoice->id;
        $bookRent->keys = '$' . uniqid() . random_int(1, PHP_INT_MAX);
        $bookRent->due_date = $transaction->months;

        $bookRent->save();

        return redirect()->route('detail-payment', $transaction_number);
    }

    function rejectPembayaran($transaction_number)
    {
        $transaction = Transaction::with('status')->where('transaction_number', $transaction_number)->first();

        $transaction->status_id = TransactionStatus::CANCEL;

        $transaction->save();

        return redirect()->route('detail-payment', $transaction_number);
    }
}
