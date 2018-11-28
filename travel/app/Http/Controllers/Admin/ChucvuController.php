<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chucvu;
use App\Http\Requests\ChucvuRequest;
class ChucvuController extends Controller
{
    public function __construct(Chucvu $objmChuvu){
        $this->objmChuvu = $objmChuvu;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmChuvu->getItems();
        return view('admin.chucvu.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        return view('admin.chucvu.add');
    }
    public function postAdd(ChucvuRequest $request){
       if($this->objmChuvu->add($request)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.chucvu.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.chucvu.index');
       }
    }
    //sửa
    public function getEdit($id){
        $objItem = $this->objmChuvu->getItem($id);
        return view('admin.chucvu.edit',compact('objItem'));
    }
    public function postEdit($id,ChucvuRequest $request){
        if($this->objmChuvu->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.chucvu.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.chucvu.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmChuvu->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.chucvu.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.chucvu.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmChuvu->search($request);
      return view('admin.chucvu.search',compact('objItems','request'));
    }
}
