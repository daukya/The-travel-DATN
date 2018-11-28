<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Tinh;
use App\Loaitour;
use App\Diadiem;
use App\Http\Requests\TourRequest;
use Str;
class TourController extends Controller
{
    public function __construct(Tour $objmTour, Tinh $objmTinh, Loaitour $objmLoaitour,Diadiem $objmDiadiem){
        $this->objmTour = $objmTour;
        $this->objmTinh = $objmTinh;
        $this->objmLoaitour = $objmLoaitour;
        $this->objmDiadiem = $objmDiadiem;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmTour->getItems();
        return view('admin.tour.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        $objItemsT = $this->objmTinh->getItemsNP();
        $objItemsLT = $this->objmLoaitour->getItemsNP();
        $objItemsDd = $this->objmDiadiem->getItemsDd();
        return view('admin.tour.add',compact('objItemsT','objItemsLT','objItemsDd'));
    }
    public function postAdd(TourRequest $request){
        //nếu nhập sô ngày số đêm giá nhỏ hơn không thì k cho nhập
        $songay = $request->songay;
        $sodem = $request->sodem;
        $gialon = $request->gialon;
        $giaem = $request->giaem;
        $gianho = $request->gianho;
        $sltd = $request->sltd;
        if($songay<=0 || $sodem<=0 || $gialon<=0 || $gianho<=0 || $giaem<=0 || $sltd<=0 ){
            $request->session()->flash('msg','Không được nhập giá trị âm');
            return redirect()->route('admin.chitiettour.index');
            die();
        }
       if($this->objmTour->add($request)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.tour.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.tour.index');
       }
    }
    //sửa
    public function getEdit($id){
        $objItem = $this->objmTour->getItem($id);
        $objItemsT = $this->objmTinh->getItemsNP();
        $objItemsLT = $this->objmLoaitour->getItemsNP();
        //$objItemsDd = $this->objmDiadiem->getItemsDd();
        $tendd = $this->objmDiadiem->getItem($objItem['id_dd'])->diemden;
        return view('admin.tour.edit',compact('objItem','objItemsT','objItemsLT','objItemsDd','tendd'));
    }
    public function postEdit($id,TourRequest $request){
        $songay = $request->songay;
        $sodem = $request->sodem;
        $gialon = $request->gialon;
        $giaem = $request->giaem;
        $gianho = $request->gianho;
        $sltd = $request->sltd;
        if($songay<=0 || $sodem<=0 || $gialon<=0 || $gianho<=0 || $giaem<=0 || $sltd<=0 ){
            $request->session()->flash('msg','Không được nhập giá trị âm');
            return redirect()->route('admin.chitiettour.index');
            die();
        }
        if($this->objmTour->edit($id,$request)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.tour.index');
       }else{
            $request->session()->flash('msg','sửa thất bại');
            return redirect()->route('admin.tour.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmTour->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.tour.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.chucvu.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmTour->search($request);
      //dd($objItems);die();
      return view('admin.tour.search',compact('objItems','request'));
    }
}
