<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function index()
    {
        if (Session::get('role') == 'User') {
            $user = User::with('profile')->findOrFail(Session::get('id'));

            return view('user/profile/profile', compact('user'));
        } else {
            return view('auth/sign-in');
        }
    }

    function update(Request $request, $id)
    {
        dd($request);

        $user = User::findOrFail($id);

        if ($user) {

            if ($request->email != $request->old_email) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^\S*$/',
                    'email' => 'required|email|unique:users',
                ]);
                $email = $request->email;
            } else {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^\S*$/'
                ]);
                $email = $request->old_email;
            }

            if ($validator->fails()) {
                Session::flash('alert', 'Gagal mengubah data');
                Session::flash('alertType', 'Danger');

                return redirect()->route('user-profile');
            }

            $user->name = $request->name;
            $user->email = $email;
            $user->profile()->first_name = $request->first_name;
            $user->profile()->last_name = $request->last_name;

            $user->save();

            Session::flash('alert', 'Data telah diubah');
            Session::flash('alertType', 'Success');
            return redirect()->route('user-profile');
        } else {

            Session::flash('alert', 'User tidak terdaftar');
            Session::flash('alertType', 'Danger');
            return redirect()->route('user-profile');
        }
    }
}
