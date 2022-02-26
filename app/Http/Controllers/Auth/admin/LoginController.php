<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function show_login_form()
    {
    	return view('auth.admin.login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        // admin login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>1])) {
            return redirect('admin/dashboard');
        }

        //logistics login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>3])) {
            return redirect('admin/dashboard');
        }

        //accountant login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>4])) {
            return redirect('admin/dashboard');
        }

        //cs login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>5])) {
            return redirect('admin/dashboard');
        }

        else {
            return redirect()->back()->withInput($request->all())->with('message', 'These Credentials do not match our records');
        }
    }

    public function logout_user()
    {
        // Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
