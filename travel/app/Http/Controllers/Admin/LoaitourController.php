<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loaitour;
use App\Http\Requests\LoaitourRequest;
class LoaitourController extends Controller
{    
	public function __construct(Loaitour $objmLoaitour){
        $this->objmLoaitour = $objmLoaitour;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmLoaitour->getItems();
        return view('admin.loaitour.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        return view('admin.loaitour.add');
    }
    public function postAdd(LoaitourRequest $request){
       if($this->objmLoaitour->add($request)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.loaitour.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.loaitour.index');
       }
    }
    //sửa
    public function getEdit($id){
        $objItem = $this->objmLoaitour->getItem($id);
        return view('admin.loaitour.edit',compact('objItem'));
    }
    public function postEdit($id,LoaitourRequest $request){
        if($this->objmLoaitour->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.loaitour.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.loaitour.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmLoaitour->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.loaitour.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.loaitour.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmLoaitour->search($request);
      return view('admin.loaitour.search',compact('objItems','request'));
    }
}
