<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        if (Session::get('role') == 'Superadmin') {

            $admins = User::with([
                'userhasrole.role',
                'accountBank.bank'
            ])
                ->whereHas('userhasrole.role', function ($query) {
                    $query->where('name', 'Admin');
                })->withTrashed()
                ->get();

            // return $admins;

            return view('superadmin/admin/manage-admin', compact('admins'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^\S*$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/\d/',
        ]);

        if ($validator->fails()) {
            Session::flash('alert', 'Gagal menambah admin');
            Session::flash('alertType', 'Danger');

            return redirect()->route('manage-admin');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->userhasrole()->create([
            'user_id' => $user->id,
            'role_id' => Role::ADMIN
        ]);

        $user->profile()->create([
            'user_id' => $user->id,
        ]);

        $user->save();

        Session::flash('alert', 'Berhasil menambah admin');
        Session::flash('alertType', 'Success');

        return redirect()->route('manage-admin');
    }

    public function detail($id)
    {

        $admin = User::with([
            'userhasrole.role',
            'accountBank.bank'
        ])->findOrFail($id);

        // return $admin;

        return view('Superadmin/admin/detail-admin', compact('admin'));
    }

    public function delete($id)
    {
        $admin = User::findOrFail($id);

        $admin->delete();

        Session::flash('alert', 'Berhasil menghapus admin');
        Session::flash('alertType', 'Success');

        return redirect()->route('manage-admin');
    }
}
