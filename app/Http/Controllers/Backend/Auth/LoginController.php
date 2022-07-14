<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function AdminLogin()
    {
        return view('auth.admin.login');
    }

    public function SubmitLogin(Request $request)
    {
        // Validate Login Data
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            session()->flash('success', 'Successully Logged in !');
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }
    }
}
