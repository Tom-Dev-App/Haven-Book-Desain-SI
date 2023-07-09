<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    function index()
    {
        if (Session::get('role') == 'Admin') {

            $user = User::with('userhasrole.role')->findOrFail(Session::get('id'));
            $bankAccount = User::with(
                'accountBank.bank',
                'accountBank.user'
            )->findOrFail(Session::get('id'));

            return view('Admin/dashboard', compact('user', 'bankAccount'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    function update(Request $request, $id)
    {
        $user = User::with('profile')->findOrFail($id);

        if ($request->name != $request->old_name) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^\S*$/'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah username');
                Session::flash('alertType', 'Danger');

                return redirect()->route('dashboard');
            }

            $user->name = $request->name;
            $user->save();

            Session::flash('alert', 'Berhasil ubah username');
            Session::flash('alertType', 'Success');

            return redirect()->route('dashboard');
        }

        if ($request->email != $request->old_email) {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah email');
                Session::flash('alertType', 'Danger');

                return redirect()->route('dashboard');
            }

            $user->email = $request->email;
            $user->save();

            Session::flash('alert', 'Berhasil ubah email');
            Session::flash('alertType', 'Success');

            return redirect()->route('dashboard');
        }

        if ($request->first_name != $request->old_first_name) {

            $validator = Validator::make($request->all(), [
                'first_name' => 'required'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah nama depan');
                Session::flash('alertType', 'Danger');

                return redirect()->route('dashboard');
            }

            $user->profile()->first_name = $request->first_name;
            $user->save();

            Session::flash('alert', 'Berhasil ubah nama depan');
            Session::flash('alertType', 'Success');

            return redirect()->route('dashboard');
        }

        if ($request->last_name != $request->old_last_name) {

            $validator = Validator::make($request->all(), [
                'last_name' => 'required'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah nama belakang');
                Session::flash('alertType', 'Danger');

                return redirect()->route('dashboard');
            }

            $user->profile()->last_name = $request->last_name;
            $user->save();

            Session::flash('alert', 'Berhasil ubah nama belakang');
            Session::flash('alertType', 'Success');

            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');
    }
}
