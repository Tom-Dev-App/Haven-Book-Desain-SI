<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

            $user = User::with('userhasrole.role', 'profile')->withTrashed()->findOrFail($id);

            // return $user;

            return view('admin/users/detail-user', compact('user'));
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
