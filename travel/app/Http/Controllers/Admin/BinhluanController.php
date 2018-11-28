<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Binhluan;
class BinhluanController extends Controller
{
	public function __construct(Binhluan $objmBinhluan){
		$this->objmBinhluan = $objmBinhluan;
	}
    public function index(){
    	$objItems = $this->objmBinhluan->getItems();
      	return view('admin.binhluan.index',compact('objItems'));
    }
    //del
    public function del($id,Request $request){
        if($this->objmBinhluan->del($id)){
            $request->session()->flash('msg','xóa thành công');
            return redirect()->route('admin.binhluan.index');
       }else{
            $request->session()->flash('msg','xóa thất bại');
            return redirect()->route('admin.binhluan.index');
       }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmBinhluan->search($request);
      return view('admin.binhluan.search',compact('objItems','request'));
    }
    //xóa nhiều
    public function delmore(Request $request){
      //dd($request->cmdel);
      if(count($request->cmdel)>0){
      foreach ($request->cmdel as $key => $value) {
        $this->objmBinhluan->del($value);
      }
       $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.binhluan.index');
    }else{
         $request->session()->flash('msg','Không có phần tử nào để xóa');
        return redirect()->route('admin.binhluan.index');
    }
}
}