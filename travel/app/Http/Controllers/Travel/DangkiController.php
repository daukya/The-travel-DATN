<?php

namespace App\Http\Controllers\Travel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\DangkiRequest;
use App\Http\Requests\CnttRequest;
class DangkiController extends Controller
{
	public function __construct(User $objmUser){
		$this->objmUser = $objmUser;
	}
    public function getDangKi(){
    	return view('travel.dangki.dangki');
    }
    public function postDangKi(DangkiRequest $request){
    	if($this->objmUser->add($request,1)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('auth.auth.login');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('auth.auth.login');
       }
    }
    //cập nhật tài khoản cá nhâ
    public function getEdit($id,Request $request){
        if(Auth::user()->id == $id){
            $objItem = $this->objmUser->getItem($id);
            return view('travel.dangki.edit',compact('objItem'));  
        }else{
            $request->session()->flash('msg','Bạn không có quyền cập nhật thông tin người khác');
            return redirect()->route('travel.index.index');
        }

    }
    public function postEdit($id,CnttRequest $request){
        if($this->objmUser->edit($id, $request)){
            $request->session()->flash('msg','cập nhật thành công');
            return redirect()->route('travel.index.index');
       }else{
            $request->session()->flash('msg','cập nhật thất bại');
            return redirect()->route('travel.index.index');
       }
    }
}
