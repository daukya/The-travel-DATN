<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\chucvu;
use App\Http\Requests\DangkiRequest;
class UsersController extends Controller
{
    public function __construct(User $objmUser,chucvu $objmChucvu){
        $this->objmUser = $objmUser;
        $this->objmChucvu = $objmChucvu;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmUser->getItems();
        return view('admin.users.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
    	$objItems = $this->objmChucvu->getItemsNP();
        return view('admin.users.add',compact('objItems'));
    }
    public function postAdd(DangkiRequest $request){
        $id_cv = $request->chucvu;
       if($this->objmUser->add($request,$id_cv)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.users.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.users.index');
       }
    }
    //sửa
    public function getEdit($id, Request $request){
        //người thường k thể chỉ có thể sửa user của chính mình admin có quyền sửa
        if($this->objmUser->getItem($id)->id==Auth::user()->id || Auth::user()->username=='admin'){
                $objItems = $this->objmChucvu->getItemsNP();
                $objItem = $this->objmUser->getItem($id);
                return view('admin.users.edit',compact('objItem','objItems')); 
            }else{
              $request->session()->flash('msg','Bạn không được sửa thông tin người khác');
                return redirect()->route('admin.users.index');die();  
            }

    }
    public function postEdit($id,DangkiRequest $request){
        if($this->objmUser->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.users.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.users.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmUser->getItem($id)->username=='admin'){
            $request->session()->flash('msg','Bạn không được xóa admin');
            return redirect()->route('admin.users.index');die();
        }
        if($this->objmUser->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.users.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.chucvu.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmUser->search($request);
      return view('admin.users.search',compact('objItems','request'));
    }
}
