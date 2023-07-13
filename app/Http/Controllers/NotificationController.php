<?php

namespace App\Http\Controllers;

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
}
