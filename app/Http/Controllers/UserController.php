<?php

namespace App\Http\Controllers;

use Auth;

class UserController extends Controller
{
    public function userLogout(){
        Auth::logout();
        return redirect('/login');
    }
}
