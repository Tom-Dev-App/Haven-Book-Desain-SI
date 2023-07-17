<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function index()
    {
            $userId = Auth::id();
            $invoices = Invoice::with(
                'transaction.user',
                'transaction.book',
            )->get();

            return view('Admin/report/manage-report', compact('invoices'));
    }

    public function detail($invoice_number)
    {
            $userId = Auth::id();
            // $transactions = Transaction::with([
            //     'companyBank.user',
            //     'book',
            //     'status',
            //     'customerBank.bank',
            //     'companyBank.bank'
            // ])->whereHas('companyBank', function ($query) use ($userId) {
            //     $query->where('user_id', $userId);
            // })
            //     ->get();

            $invoice = Invoice::with(
                'transaction.user',
                'transaction.book',
                'transaction.status',
                'transaction.admin',
                'transaction.companyBank.bank',
                'transaction.customerBank.bank',
            )->where('invoice_number', $invoice_number)
                ->first();

            return view('Admin/report/detail-report', compact('invoice'));
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

            return view('Admin/report/kwitansi', compact('invoice'));
    }
}
