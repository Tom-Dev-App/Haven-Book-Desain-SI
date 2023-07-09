<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function index()
    {
        if (Session::get('role') == 'Admin') {

            $userId = Session::get('id');

            // Invoices
            $invoices = Invoice::with(
                'transaction.user',
                'transaction.book',
            )->get();

            // return $invoices;

            return view('Admin/report/manage-report', compact('invoices'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    public function detail($invoice_number)
    {
        if (Session::get('role') == 'Admin') {

            $userId = Session::get('id');
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

            // return $invoice;

            return view('Admin/report/detail-report', compact('invoice'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    public function print($invoice_number)
    {
        if (Session::get('role') == 'Admin') {

            $invoice = Invoice::with(
                'transaction.user',
                'transaction.book',
                'transaction.status',
                'transaction.admin',
                'transaction.companyBank.bank',
                'transaction.customerBank.bank',
            )->where('invoice_number', $invoice_number)
                ->first();

            // return $invoice;

            return view('Admin/report/kwitansi', compact('invoice'));
        } else {
            return redirect()->route('sign-in');
        }
    }
}
