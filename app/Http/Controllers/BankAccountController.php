<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function listBankAccountsVerificationRequest()
    {
        $list = BankAccount::where('status', 'review')->paginate(30);
        return view('admin.bank-account.list', compact('list'));
    }

    public function acceptBankAccount($id)
    {
        $account = BankAccount::find($id);
        if ($account) {
            $account->status = 'confirm';
            $account->save();
            return back()->with('msg', 'با موفقیت تایید شد');
        }
        return back()->with('msg', 'موردی یافت نشد');

    }

    public function rejectBankAccount(Request $request, $id)
    {
        $account = BankAccount::find($id);
        if ($account) {
            $account->status = 'reject';
            $account->note = $request->note;
            $account->save();
            return back()->with('msg', 'با موفقیت رد شد');
        }
        return back()->with('msg', 'موردی یافت نشد');

    }
}
