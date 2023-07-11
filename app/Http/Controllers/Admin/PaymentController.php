<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookRent;
use App\Models\Invoice;
use App\Models\TransactionStatus;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    function index()
    {
        if (Session::get('role') == 'Admin') {

            $userId = Session::get('id');

            $transactions = Transaction::with([
                'companyBank.user',
                'book',
                'status',
                'customerBank.bank',
                'companyBank.bank'
            ])
                ->where('transactions.status_id', '=', '1')
                ->whereHas('companyBank', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->orderBy('id', 'desc')
                ->get();

            $cardholder = User::with('accountBank.bank')->findOrFail($userId);

            return view('admin/payment/manage-payment', compact('transactions', 'cardholder'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    function detail($transaction_number)
    {
        if (Session::get('role') == 'Admin') {

            $userId = Session::get('id');

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

            // return $transaction;

            return view('admin/payment/payment-verification-detail', compact('transaction'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    function accPembayaran($transaction_number)
    {
        $transaction = Transaction::with(
            'user',
            'book',
            'status',
        )->where('transaction_number', $transaction_number)->first();

        // return $transaction;

        $transaction->status_id = TransactionStatus::SUCCESS;

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
        $bookRent->due_date = now();

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
