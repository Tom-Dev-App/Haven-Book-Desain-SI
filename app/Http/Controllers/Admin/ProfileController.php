<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    function index()
    {

        $user = User::with('userhasrole.role')->findOrFail(Session::get('id'));
        return view('Admin/profile/profile', compact('user'));
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

                return redirect()->route('admin-profile');
            }

            $user->name = $request->name;
            $user->save();

            Session::flash('alert', 'Berhasil ubah username');
            Session::flash('alertType', 'Success');

            return redirect()->route('admin-profile');
        }

        if ($request->email != $request->old_email) {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah email');
                Session::flash('alertType', 'Danger');

                return redirect()->route('admin-profile');
            }

            $user->email = $request->email;
            $user->save();

            Session::flash('alert', 'Berhasil ubah email');
            Session::flash('alertType', 'Success');

            return redirect()->route('admin-profile');
        }

        if ($request->first_name != $request->old_first_name) {

            $validator = Validator::make($request->all(), [
                'first_name' => 'required'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah nama depan');
                Session::flash('alertType', 'Danger');

                return redirect()->route('admin-profile');
            }

            $user->profile()->first_name = $request->first_name;
            $user->save();

            Session::flash('alert', 'Berhasil ubah nama depan');
            Session::flash('alertType', 'Success');

            return redirect()->route('admin-profile');
        }

        if ($request->last_name != $request->old_last_name) {

            $validator = Validator::make($request->all(), [
                'last_name' => 'required'
            ]);

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal ubah nama belakang');
                Session::flash('alertType', 'Danger');

                return redirect()->route('admin-profile');
            }

            $user->profile()->last_name = $request->last_name;
            $user->save();

            Session::flash('alert', 'Berhasil ubah nama belakang');
            Session::flash('alertType', 'Success');

            return redirect()->route('admin-profile');
        }

        return redirect()->route('admin-profile');
    }
}
