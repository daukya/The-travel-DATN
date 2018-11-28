<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Chuongtrinhtour;
use App\Http\Requests\ChuongtrinhtourRequest;
class ChuongtrinhController extends Controller
{
    public function __construct(Tour $objmTour,Chuongtrinhtour $objmChuongtrinhtour){
        $this->objmTour = $objmTour;
        $this->objmChuongtrinhtour = $objmChuongtrinhtour;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmChuongtrinhtour->getItems();
        return view('admin.chuongtrinhtour.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        $objItems = $this->objmTour->getItemsNP();
        return view('admin.chuongtrinhtour.add',compact('objItems'));
    }
    public function postAdd(ChuongtrinhtourRequest $request){
    	//kiểm tra nếu với tên tour đó mà ngày thứ trùng thì k cho thêm vào
       	$mang = $this->objmChuongtrinhtour->getItemsCT($request->tour);
    	foreach ($mang as $key => $value) {
    		if($value['ngaythu']==$request->ngaythu){
    			$request->session()->flash('msg','ngày thứ của tour này đã tồn tại');
    			return redirect()->route('admin.chuongtrinhtour.add');
            	die();
    		}
    	}
       if($this->objmChuongtrinhtour->add($request)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.chuongtrinhtour.add');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.chuongtrinhtour.add');
       }
    }
    //sửa
    public function getEdit($id){
        $objItems = $this->objmTour->getItemsNP();
        $objItemCT = $this->objmChuongtrinhtour->getItem($id);
        return view('admin.chuongtrinhtour.edit',compact('objItemCT','objItems'));
    }
    public function postEdit($id,ChuongtrinhtourRequest $request){
        if($this->objmChuongtrinhtour->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.chuongtrinhtour.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.chuongtrinhtour.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmChuongtrinhtour->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.chuongtrinhtour.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.chuongtrinhtour.index');
       }
    }
    //tìm kiếm tên tour hoặc ngày thứ
    public function search(Request $request){
      $objItems = $this->objmChuongtrinhtour->search($request);
      return view('admin.chuongtrinhtour.search',compact('objItems','request'));
    }
}
