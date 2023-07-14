<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    function index()
    {
            $user = User::with(
                'profile'
            )->findOrFail(Auth::id());

            $userAccounts = BankAccount::with('bank', 'user')->where('user_id', Auth::id())->get();

            $banks = Bank::all();

            return view('user/profile/profile', compact('user',  'banks', 'userAccounts'));
    }

    public function upload(Request $request, $id)
    {
        $user = UserProfile::where('user_id', $id)->first();

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:4096',
        ]);

        if ($validator->fails()) {
            Session::flash('alert', 'Gagal upload foto');
            Session::flash('alertType', 'Danger');

            return redirect()->route('user-profile');
        }

        $path = $request->file('image')->store('public/images/profile');
        $imagePath = Storage::url($path);

        $user->profile_path = $imagePath;
        $user->save();

        Session::flash('alert', 'Berhasil upload foto');
        Session::flash('alertType', 'Success');

        return redirect()->route('user-profile');
    }

   function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $profile = UserProfile::where('user_id', $id)->first();

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
            $profile->first_name = $request->first_name;
            $profile->last_name = $request->last_name;

            $user->save();
            $profile->save();

            Session::flash('alert', 'Data telah diubah');
            Session::flash('alertType', 'Success');
            return redirect()->route('user-profile');
        } else {

            Session::flash('alert', 'User tidak terdaftar');
            Session::flash('alertType', 'Danger');
            return redirect()->route('user-profile');
        }
    }

    public function addBankAccount(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'account_number' => 'required|unique:bank_accounts'
        ]);

        if ($validator->fails()) {
            Session::flash('alert', 'Gagal menambah rekening');
            Session::flash('alertType', 'Danger');

            return redirect()->route('user-profile');
        }

        $bankAccount = BankAccount::create([

            'user_id' => $id,
            'bank_id' => $request->bank,
            'account_number' => $request->account_number
        ]);

        $bankAccount->save();

        Session::flash('alert', 'Berhasil daftar rekening');
        Session::flash('alertType', 'Success');

        return redirect()->route('user-profile');
    }

    public function deleteBankAccount($id)
    {
        $bankAccount = BankAccount::findOrFail($id);

        $bankAccount->delete();

        Session::flash('alert', 'Berhasil hapus rekening');
        Session::flash('alertType', 'Success');

        return redirect()->route('user-profile');
    }
}
