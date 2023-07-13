<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $transactions = auth()->user()->customerTransactions()->with(['invoice', 'status', 'book'])->orderByDesc('id')->get();

        $rents = auth()->user()->rents()->get();
        return view('User.notification.index', compact('transactions'));
    }
}
