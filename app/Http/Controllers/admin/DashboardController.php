<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $users = User::count();
        return view('admin.dashboard.dashboard',compact('users'));
    }
}
