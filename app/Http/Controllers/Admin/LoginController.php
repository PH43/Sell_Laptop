<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password];
        if($request->remember = 'Remember Me'){
            $remember = true;   
        }else{
            $remember = false;
        }
        if(Auth::attempt($arr,$remember)){
            //dd('Thành công');
            return redirect()->intended('admin/home');
        }else{
            //dd('Thất bại');
            return back()->withInput()->with('error','Email hoặc mật khẩu chưa đúng');
        }
    }
}
