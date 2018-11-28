<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diadiem;
use App\Tinh;
use App\Http\Requests\DiadiemRequest;
class DiadiemController extends Controller
{
    public function __construct(Diadiem $objmDiadiem,Tinh $objmTinh){
        $this->objmDiadiem = $objmDiadiem;
        $this->objmTinh = $objmTinh;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmDiadiem->getItems();
        return view('admin.diadiem.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        $objItemsT = $this->objmTinh->getItemsNP();
        return view('admin.diadiem.add',compact('objItemsT'));
    }
    public function postAdd(DiadiemRequest $request){
       if($this->objmDiadiem->add($request)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.diadiem.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.diadiem.index');
       }
    }
    //sửa
    public function getEdit($id){
        $objItemx = $this->objmDiadiem->getItem($id);
        $objItemsT = $this->objmTinh->getItemsNP();
        return view('admin.diadiem.edit',compact('objItemsT','objItemx'));
    }
    public function postEdit($id,DiadiemRequest $request){
        if($this->objmDiadiem->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.diadiem.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.diadiem.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmDiadiem->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.diadiem.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.diadiem.index');
       }
    }
    //tìm kiếm tỉnh hoặc địa điểm đến
    public function search(Request $request){
      $objItems = $this->objmDiadiem->search($request);
      return view('admin.diadiem.search',compact('objItems','request'));
    }
}
