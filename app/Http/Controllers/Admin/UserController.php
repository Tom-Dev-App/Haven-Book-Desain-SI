<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function index()
    {
        if (Session::get('role') == 'Admin') {

            $users = User::with('userhasrole.role', 'profile')->withTrashed()->get();

            // return $users;

            return view('admin/users/manage-user', compact('users'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    function detail($id)
    {
        if (Session::get('role') == 'Admin') {

            $user = User::with(
                'userhasrole.role',
                'profile'
            )->withTrashed()->findOrFail($id);

            $transactions = Transaction::with(
                'book',
                'status',
                'admin',
                'companyBank',
                'customerBank'
            )
                ->where('user_id', $id)
                ->withTrashed()
                ->get();

            // return $transactions;

            return view('admin/users/detail-user', compact('user', 'transactions'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        Session::flash('alert', 'Berhasil menghapus user');
        Session::flash('alertType', 'Success');

        return redirect()->route('detail-user', $id);
    }
}
