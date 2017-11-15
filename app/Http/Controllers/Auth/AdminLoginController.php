<?php

namespace miner_junction\Http\Controllers\Auth;

use Illuminate\Http\Request;
use miner_junction\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect('/home');
        }
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successfull
            return redirect()->intended(route('admin.dashboard'));
        }

        // If unsuccessfull        
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
