<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    function index()
    {
            $user = User::find(Auth::id());
            $banks = Bank::get();
            $bankAccounts = BankAccount::with('bank', 'user')->get();

            return view('Admin/dashboard', compact('user', 'bankAccounts', 'banks'));
    }

    function update(Request $request, $id)
    {
        $user = User::with('profile')->findOrFail($id);
        $profile = UserProfile::where('user_id', $id)->first();

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

            // return redirect()->route('dashboard');
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

            // return redirect()->route('dashboard');
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

            $profile->first_name = $request->first_name;
            $profile->save();

            Session::flash('alert', 'Berhasil ubah nama depan');
            Session::flash('alertType', 'Success');

            // return redirect()->route('dashboard');
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

            $profile->last_name = $request->last_name;
            $profile->save();

            Session::flash('alert', 'Berhasil ubah nama belakang');
            Session::flash('alertType', 'Success');

            // return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');
    }

    public function addBankAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_number' => 'required|unique:bank_accounts'
        ]);

        if ($validator->fails()) {
            Session::flash('alert', 'Gagal menambah rekening');
            Session::flash('alertType', 'Danger');

            return redirect()->route('dashboard');
        }

        $bankAccount = BankAccount::create([

            'user_id' => Session::get('id'),
            'bank_id' => $request->bank,
            'account_number' => $request->account_number
        ]);

        $bankAccount->save();

        Session::flash('alert', 'Berhasil daftar rekening');
        Session::flash('alertType', 'Success');

        return redirect()->route('dashboard');
    }

    public function deleteBankAccount($id)
    {
        $bankAccount = BankAccount::findOrFail($id);

        $bankAccount->delete();

        Session::flash('alert', 'Berhasil hapus rekening');
        Session::flash('alertType', 'Success');

        return redirect()->route('dashboard');
    }
}
