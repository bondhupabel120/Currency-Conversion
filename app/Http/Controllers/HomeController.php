<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $current_balance = User::where('id', $user_id)->select('wallet', 'currency')->first();
        $total_send_money = Conversion::where('sender_id', $user_id)->sum('send_amount');
        $total_receive_money = Conversion::where('user_id', $user_id)->sum('receive_amount');
        return view('backend.home.home', compact('current_balance', 'total_send_money', 'total_receive_money'));
    }
}
