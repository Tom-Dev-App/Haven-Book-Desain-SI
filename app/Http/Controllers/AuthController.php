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
        return view('auth/sign-in');
    }

    function signUp()
    {
        return view('auth/sign-up');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
        
        Session::flash('alert', 'Gagal, ulangi login');
        Session::flash('alertType', 'Danger');

        return redirect()->back();
    }

    public function register(Request $request)
    {
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

        $user->assignRole('user');

        $user->profile()->create([
            'user_id' => $user->id,
        ]);

        $user->save();

        // Automatically log in the user
        Auth::login($user);

        return redirect()->route('homepage');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route('sign-in');
    }
}
