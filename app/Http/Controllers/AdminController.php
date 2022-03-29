<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index() {
        return view('login');
    }

    public function adminLogin(Request $request) {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|min:5|max:50',
        ]);

        $admin = Admin::where('username',$request->username)->where('password',$request->password)->get()->toArray();
        
        if($admin) {
            $request->session()->put('admin_id',$admin[0]['id']);
            $request->session()->put('admin_login',true);
            $request->session()->flash('success','You are Login Successfully!');
            return redirect('dashboard');
        }else {
            $request->session()->flash('error','Email or Password wrong');
            return redirect('login');
        }
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function logout(Request $request) {
        $request->session()->invalidate();
        $request->session()->flash('success','Logout Successfully');
        return redirect('login');
    }
}
