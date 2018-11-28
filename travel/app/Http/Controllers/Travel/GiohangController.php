<?php

namespace App\Http\Controllers\Travel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\ChiTietTour;
use App\Tour;
class GiohangController extends Controller
{
	public function __construct(ChiTietTour $objmChitiettour,Tour $objmTour){
		$this->objmChitiettour=$objmChitiettour;
		$this->objmTour=$objmTour;
	}
	public function index(){
		$gioTour = Cart::content();
		return view('travel.giohang.index',compact('gioTour'));
	}
    public function add($slug,$id){
    	//hiển thị ngày đi, ngày về hình ảnh, số lượng còn
    	$thongtinchitiet = $this->objmChitiettour->getItem($id);
    	$id_tour = $this->objmChitiettour->getItem($id)->id_tour;
    	$thongtintour = $this->objmTour->getItem($id_tour);
    	$objItems = Cart::add([
		                'id' => $id , 
		                'name' => $thongtintour->tentour ,
		                'qty' => 1,
		                'price' => $thongtintour->gianguoilon,
                        'options' => ['img' =>$thongtinchitiet->hinhanh]
            		]);
    	return redirect()->route('travel.tour.detail',['slug'=>$slug,'id' => $id]);
    }
    public function remove($rowId,Request $request){
    	if(Cart::count()==0){
			$request->session()->flash('msg','Không có sản phẩm nào trong giỏ hàng');
            return $this->index(); die();
		}
    	Cart::remove($rowId);
    	return $this->index();
    }
    public function delall(){
    	Cart::destroy();
    	return $this->index();
    }
}
