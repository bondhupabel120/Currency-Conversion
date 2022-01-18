<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    /* Frontend View */
    public function index()
    {
        $most_conversion = DB::table('users')
            ->leftJoin('conversions', 'conversions.sender_id', '=', 'users.id')
            ->select('users.name', 'users.currency', DB::raw("COUNT(conversions.id) as conversion"))
            ->orderBy('conversion', 'desc')
            ->groupBy('users.id')
            ->first();
        $users = User::all();
        $third_highests = DB::table('users')
            ->select('users.*', DB::raw("(SELECT conversions.send_amount FROM conversions WHERE conversions.sender_id = users.id ORDER BY send_amount DESC LIMIT 1 OFFSET 2) as third"))
            ->get();
        return view('frontend.home', compact('most_conversion', 'users', 'third_highests'));
    }
}
