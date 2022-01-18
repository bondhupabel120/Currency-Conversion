<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

class ConversionController extends Controller
{
    /* Send Money View */
    public function sendMoney()
    {
        $users = User::where('id', '!=', Auth::user()->id)->orderBy('name', 'asc')->get();
        return view('backend.conversion.send_money', compact('users'));
    }
    /* Money Check by Ajax */
    public function moneyCheck(Request $request)
    {
        try {
            $money = User::where('id', Auth::user()->id)->where('wallet', '>=', $request->amount)->first();
            if ($money == null || $money == '' || $money == ' ') {
                $msg = "success";
                return response()->json($msg);
            } else {
                $msg = "error";
                return response()->json($msg);
            }
        } catch (\Exception $e) {
            return back()->with('message', 'Something wrong, please try again.')->withErrors('Something wrong, please try again');
        }
    }
    /* Send Money Post for Save */
    public function saveSendMoney(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'amount' => 'required',
        ]);
        Conversion::saveSendMoneyData($request);
        return back()->with('message', 'Your Money Transfer Successfully.');
    }
}
