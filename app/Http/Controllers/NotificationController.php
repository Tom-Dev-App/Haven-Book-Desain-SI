<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $transactions = auth()->user()->customerTransactions()->with(['invoice', 'status', 'book'])->get();
        $rents = auth()->user()->rents()->get();
        return view('User.notification.index', compact('transactions'));
    }
}
