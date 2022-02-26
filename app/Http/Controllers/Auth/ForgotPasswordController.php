<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    public function match_email(Request $request)
    {
        // dd($request->all());
        $user = User::where('email', $request->email)->first();
        if($user) {
            return view('front.section.forgot');
        } else {
            return response()->json(['message' => 'Email not found! Please try again.']);
        }
    }

    public function change_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user) {
            $password = $request->password;
            $confirmPass = $request->confirm_password;
            if($password != $confirmPass) {
                return response()->json(['error_message' => 'Password not matched! Please try again.']);
            }
            $user->password = Hash::make($password);
            $user->update();
            Auth::login($user);
            return redirect('/');
        } else {
            return response()->json(['error_message' => 'Email not found! Please try again.']);
        }
    }
}
