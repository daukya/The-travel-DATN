<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Phieudat;
class PhieudatController extends Controller
{
    public function __construct(Phieudat $objmPhieudat){
		$this->objmPhieudat = $objmPhieudat;
	}
    public function index(){
    	$objItems = $this->objmPhieudat->getItems();
      	return view('admin.phieudat.index',compact('objItems'));
    }
    //del
    public function del($id,Request $request){
        if($this->objmPhieudat->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.phieudat.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.phieudat.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmPhieudat->search($request);
      return view('admin.phieudat.search',compact('objItems','request'));
    }
}
