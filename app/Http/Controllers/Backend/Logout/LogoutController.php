<?php

namespace App\Http\Controllers\Backend\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class LogoutController extends Controller
{
    public function Logout() {
        Auth::logout();
        return redirect()->route('auth.login');
        }
       
}
