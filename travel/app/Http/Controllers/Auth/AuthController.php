<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function getLogin(){
    	return view('auth.auth.login');
    }
    public function postLogin(Request $request){
    	$username = $request->username;
    	$pass = $request->pass;
    	//kiểm tra tồn tại và chuyển hướng
    	if(Auth::attempt(['username' => $username,'password' => $pass])){
    		if(Auth::user()->id_cv==1){
    			return redirect()->route('travel.index.index');
    		}else{
    			return redirect()->route('admin.index.index');
    		}
    	}else{
    		$request->session()->flash('msg','Sai username hoặc mật khẩu! ');
    		return redirect()->route('auth.auth.login');
    	}
    }

    //logout
    public function logOut(){
    	Auth::logout();
    	return redirect()->route('auth.auth.login');
    }
}
