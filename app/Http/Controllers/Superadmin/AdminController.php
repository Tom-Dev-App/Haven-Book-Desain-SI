<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $role = Role::where('name', 'superadmin')->first();
        $admins = User::role($role)
                ->with(['profile', 'accountBank.bank'])
                ->withTrashed()
                ->get();

        return view('superadmin/admin/manage-admin', compact('admins'));
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

        $user->assignRole('admin');

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
            'roles',
            'accountBank.bank'
            ])->findOrFail($id);

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
