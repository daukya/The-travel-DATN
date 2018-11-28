<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Chitiettour;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChitiettourRequest;
class ChitietController extends Controller
{
    public function __construct(Tour $objmTour,Chitiettour $objmChitiettour){
        $this->objmTour = $objmTour;
        $this->objmChitiettour = $objmChitiettour;
    }
    //lấy all
    public function index(){
        $objItems = $this->objmChitiettour->getItems();
        return view('admin.chitiettour.index',compact('objItems'));
    }
    //thêm
    public function getAdd(){
        $objItemsT = $this->objmTour->getItemsNP();
        return view('admin.chitiettour.add',compact('objItemsT'));
    }
    public function postAdd(ChitiettourRequest $request){
        //thêm hình ảnh
        if($request->file('hinhanh')!=Null){
            $path = $request->file('hinhanh')->store('files');
            $arFile = explode('/', $path);
            $picture = end($arFile);
        }else{
            return $this->getAdd();
        }
        //Nếu thêm tour mà ngày đi nhỏ hơn ngày hệ thống thì in báo lỗi
        $ngaydi = $request->ngaydi;
        $ngayve = $request->ngayve;
        if($ngaydi<date("Y-m-d H:i:s")){
            $request->session()->flash('msg','Thêm không thành công! ngày đi không thể nhỏ hơn ngày hiện tại');
            return redirect()->route('admin.chitiettour.index');
            die();
        }
        // ngày đi lớn hơn ngày về
        if($ngaydi>$ngayve){
            $request->session()->flash('msg','Thêm không thành công! ngày đi không thể lớn hơn ngày về');
            return redirect()->route('admin.chitiettour.index');
            die();
        }
       if($this->objmChitiettour->add($request,$ngaydi,$ngayve,$picture)){
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.chitiettour.index');
       }else{
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.chitiettour.index');
       }
    }
    //sửa
    public function getEdit($id,Request $request){
        //không được sửa tin người khác ngoại trừ admin
        if($this->objmChitiettour->getItem($id)->id==Auth::user()->id || Auth::user()->username=='admin'){
            $objItemsT = $this->objmTour->getItemsNP();
            $objItem = $this->objmChitiettour->getItem($id);
            return view('admin.chitiettour.edit',compact('objItem','objItemsT'));
        }else{
             $request->session()->flash('msg','Bạn không được sửa tin người khác');
            return redirect()->route('admin.chitiettour.index');die();   
        }
        
    }
    public function postEdit($id,ChitiettourRequest $request){
        //sửa tin có hình
        if($request->file('hinhanh')!=Null){
            $hinhanh = $this->objmChitiettour->getItem($id)->hinhanh;
            storage::delete('files/'.$hinhanh);
            $path = $request->file('hinhanh')->store('files');
            $arFile = explode('/', $path);
            $picture = end($arFile);
        }else{
            $picture = $hinhanh = $this->objmChitiettour->getItem($id)->hinhanh;
        }

        $ngaydi = $request->ngaydi;
        $ngayve = $request->ngayve;
         if($ngaydi<date("Y-m-d H:i:s")){
            $request->session()->flash('msg','Sửa không thành công! ngày đi không thể nhỏ hơn ngày hiện tại');
            return redirect()->route('admin.chitiettour.index');
            die();
        }
        // ngày đi lớn hơn ngày về
        if($ngaydi>$ngayve){
            $request->session()->flash('msg','Thêm không thành công! ngày đi không thể lớn hơn ngày về');
            return redirect()->route('admin.chitiettour.index');
            die();
        }
        if($this->objmChitiettour->edit($id,$request,$ngaydi,$ngayve,$picture)){
            $request->session()->flash('msg','sửa thành công');
            return redirect()->route('admin.chitiettour.index');
       }else{
            //$request->session()->flash('msg','sửa thất bại');
            //return redirect()->route('admin.chitiettour.index');
       }
    }
    //xóa
    public function del($id,Request $request){
        if($this->objmChitiettour->getItem($id)->id==Auth::user()->id || Auth::user()->username=='admin'){
            $hinhanh = $this->objmChitiettour->getItem($id)->hinhanh;
                storage::delete('files/'.$hinhanh);
            if($this->objmChitiettour->del($id)){
                $request->session()->flash('msg','xóa thành công');
                return redirect()->route('admin.chitiettour.index');
           }else{
                $request->session()->flash('msg','xóa thất bại');
                return redirect()->route('admin.chitiettour.index');
           }
        }else{
            $request->session()->flash('msg','Bạn không thể xóa tin người khác');
            return redirect()->route('admin.chitiettour.index');die();  
        }
    }
    //tìm kiếm
    public function search(Request $request){
      $objItems = $this->objmChitiettour->search($request);
      return view('admin.chitiettour.search',compact('objItems','request'));
    }
}
