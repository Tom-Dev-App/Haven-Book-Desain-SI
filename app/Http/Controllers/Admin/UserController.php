<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function index()
    {
        $role = Role::where('name', 'user')->first();

        $users = User::role($role)
            ->with(['profile'])
            ->withTrashed()
            ->get();

        return view('admin/users/manage-user', compact('users'));
    }

    function detail($id)
    {   
            $user = User::with('profile')->withTrashed()->find($id);
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

            return view('admin/users/detail-user', compact('user', 'transactions'));
    }

    function delete($id)
    {
        User::find($id)->delete();

        Session::flash('alert', 'Berhasil menghapus user');
        Session::flash('alertType', 'Success');

        return redirect()->route('detail-user', $id);
    }
}
