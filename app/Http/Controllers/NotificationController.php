<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $title = 'Payments';
        $transactions = auth()->user()->customerTransactions()->with(['invoice', 'status', 'book'])->orderByDesc('id')->get();
        $rents = auth()->user()->rents()->with('book')->get();

        return view('User.notification.index', compact('transactions', 'title', 'rents'));
    }

    public function print($invoice_number)
    {
        $invoice = Invoice::with(
            'transaction.user',
            'transaction.book',
            'transaction.status',
            'transaction.admin',
            'transaction.companyBank.bank',
            'transaction.customerBank.bank',
        )->where('invoice_number', $invoice_number)
            ->first();

        return view('User/notification/kwitansi', compact('invoice'));
    }
}
