<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tinh;
use App\Http\Requests\TinhRequest;
class TinhController extends Controller
{
    public function __construct(Tinh $objmTinh){
        $this->objmTinh = $objmTinh;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmTinh->getItems();
        return view('admin.tinh.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        return view('admin.tinh.add');
    }
    public function postAdd(TinhRequest $request){
       if($this->objmTinh->add($request)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.tinh.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.tinh.index');
       }
    }
    //sửa
    public function getEdit($id){
        $objItem = $this->objmTinh->getItem($id);
        return view('admin.tinh.edit',compact('objItem'));
    }
    public function postEdit($id,TinhRequest $request){
        if($this->objmTinh->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.tinh.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.tinh.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmTinh->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.tinh.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.tinh.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmTinh->tk($request);
      return view('admin.tinh.search',compact('objItems','request'));
    }
}
