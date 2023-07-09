<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserhasRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function signIn()
    {
        if (Session::get('role') == 'User') {
            return redirect()->route('homepage');
        } else if (Session::get('role') == 'Admin') {
            return redirect()->route('dashboard');
        } else {
            return view('auth/sign-in');
        }
    }

    function signUp()
    {
        if (Session::get('role') == 'User') {
            return redirect()->route('homepage');
        } else if (Session::get('role') == 'Admin') {
            return redirect()->route('dashboard');
        } else {
            return view('auth/sign-up');
        }
    }

    public function login(Request $request)
    {
        // Validasi inputan email dan password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mengambil data user berdasarkan email
        $user = User::with('userhasrole.role')->where('email', $credentials['email'])->first();


        // Jika user ditemukan dan passwordnya valid
        if ($user && Auth::attempt($credentials)) {

            // Melakukan autentikasi role admin atau user
            if ($user->userhasrole->role['name'] == 'Admin') {
                // User memiliki role admin

                Session::put('name', $user['name']);
                Session::put('role', $user->userhasrole->role['name']);
                Session::put('id', $user['id']);

                return redirect()->route('dashboard');
            } elseif ($user->userhasrole->role['name'] == 'User') {
                // User biasa



                Session::put('name', $user['name']);
                Session::put('role', $user->userhasrole->role['name']);
                Session::put('id', $user['id']);


                return redirect()->route('homepage');
            } elseif ($user->userhasrole->role['name'] == 'Superadmin') {

                Session::put('name', $user['name']);
                Session::put('role', $user->userhasrole->role['name']);
                Session::put('id', $user['id']);

                return redirect()->route('admin-controller');
            }
        } else {
            Session::flash('alert', 'Gagal, ulangi login');
            Session::flash('alertType', 'Danger');

            return redirect()->route('sign-in');
        }

        // Jika login gagal
        return redirect()->route('sign-in');
    }

    public function register(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^\S*$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/\d/',
        ]);

        if ($validator->fails()) {
            Session::flash('alert', 'Gagal, ulangi registrasi');
            Session::flash('alertType', 'Danger');

            return redirect()->route('sign-up');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->userhasrole()->create([
            'user_id' => $user->id,
            'role_id' => Role::USER
        ]);

        $user->profile()->create([
            'user_id' => $user->id,
        ]);

        $user->save();

        Session::put('name', $request['name']);
        Session::put('role', 'User');
        Session::put('id', $user->id);

        return redirect()->route('homepage');
    }

    public function logout()
    {
        Session::forget('name');
        Session::forget('role');

        return redirect()->route('sign-in');
    }
}
