<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{
    function index()
    {
        // return Session::get('role');
        return view('homepage', [
            "title" => 'Home']);
    }
}
