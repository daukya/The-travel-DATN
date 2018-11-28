<?php

namespace App\Http\Controllers\Travel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loaitour;
use App\Tour;
use App\Chuongtrinhtour;
use App\Chitiettour;
use App\Phieudat;
use App\Binhluan;
use Mail;
use App\Http\Requests\PhieudatRequest;
class TourController extends Controller
{
    public function __construct(Loaitour $objmLoaitour,Tour $objmTour, Chuongtrinhtour $objmChuongtrinhtour,Chitiettour $objmChitiettour, phieudat $objmPhieudat,Binhluan $objmBinhluan){
        $this->objmLoaitour = $objmLoaitour;
        $this->objmTour = $objmTour;
        $this->objmChuongtrinhtour = $objmChuongtrinhtour;
        $this->objmChitiettour = $objmChitiettour;
        $this->objmPhieudat = $objmPhieudat;
        $this->objmBinhluan = $objmBinhluan;
    }
    //loại tour
    public function index($id){
        $objItem = $this->objmLoaitour->getItem($id);
        $objItems = $this->objmTour->getItemsPL($id);
    	return view('travel.tour.index',compact('objItem','objItems'));
    }
    public function detail($slug,$id){
        //lấy chi tiết 1 tour
        $objItemPL = $this->objmTour->getItemPL($id);
        //từ id chitiet lấy id tour truyền cho chương trình tour
        $id_tour = $this->objmChitiettour->getItem($id)->id_tour;
        //lấy chương trình tour
        $objItemCT = $this->objmChuongtrinhtour->getItemsCT($id_tour);
        //lấy id_lt loại tour
        $id_lt = $this->objmTour->getItem($id_tour)->id_lt;
        //lấy 3 tour liên quan
        $obj3ItemsLQ = $this->objmTour->get3ItemLQ($id_lt,$id);
        $obj1ItemNB = $this->objmTour->getItem1NB();
        //hiển thị bình luận ra public
        $objItemsBL = $this->objmBinhluan->getItemsBL($id);
    	return view('travel.tour.detail',compact('objItemPL','objItemCT','obj3ItemsLQ','obj1ItemNB','objItemsBL'));
    }
    public function hdao(){
        //echo "tuyền";die();
        $objItem = $this->objmPhieudat->getItem();
        //lấy id_chitiet để lấy thông tin của tour đó
        $id_chitiet = $objItem[0]->id_chitiet;
        //echo $id_chitiet;die();
        $ten = $this->objmTour->getItemPL($id_chitiet)[0]->tentour;
        $ngaykh = $this->objmTour->getItemPL($id_chitiet)[0]->ngaydi;
        $diemkh = $this->objmTour->getItemPL($id_chitiet)[0]->diemden;
         // echo $ten;die();
        // e xem lai dạ
        return view('travel.tour.hdao',compact('ten','ngaykh','diemkh','objItem'));
    }
    //get pd
    public function getPhieudat($id,$slug,Request $request){
        if(!isset(Auth::user()->id)){
            $request->session()->flash('msg','Hi, bạn phải đăng nhập trước khi đặt tour!');
            return redirect()->route('auth.auth.login');
            die();
        }
        //lấy tên khách hàng ra
        $ten = Auth::user()->ten;
        $objItem = $this->objmTour->getItemPL($id);
    	return view('travel.tour.phieudat',compact('objItem','ten'));
    }
    //post pd
    public function postPhieudat(PhieudatRequest $request, $id,$slug){
        $objItem = $this->objmTour->getItemPL($id);
        //tính tiền
        $tienlon = $request->nguoilon * $objItem[0]->gianguoilon;   
        $tienem = $request->treem * $objItem[0]->giatreem;   
        $tiennho = $request->trenho * $objItem[0]->giatrenho; 
        //cập nhật số lượng còn của tour chi tiêt
        $slc = $objItem[0]->soluongcon;
        $sld = $request->nguoilon + $request->treem;
        $thanhtoan = $tienlon + $tienem + $tiennho;
        //echo $slc; echo $sld; die();
        if($sld>$slc){
            $request->session()->flash('msg',"Chú ý: chỉ còn $slc chỗ");
            return redirect()->route('travel.tour.phieudat',['id' => $id,'slug'=>$slug]);die();
        }
        $this->objmChitiettour->cnSLC($id,$slc,$sld);


        //-------------------- Gửi mail -----------------------
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
        $data = ['tentour' => $objItem[0]->tentour,'ngaydi' => $objItem[0]->ngaydi,'ngayve' => $objItem[0]->ngayve,'sld' => $sld,'tenkh'=>Auth::user()->ten,'dc'=>Auth::user()->diachi,'sdt'=>Auth::user()->sdt,'ghichu'=>Auth::user()->ghichu,'nguoilon'=>$request->nguoilon,'treem'=>$request->treem,'trenho'=>$request->trenho,'thongtin'=>$request->ghichu,'thanhtoan'=>$thanhtoan,'mess' => $request->message];
        Mail::send('mailsend',$data,function($message){
            $message -> from('lenguyenthanhtuyen97@gmail.com','Bé ngốc');
            $message -> to(Auth::user()->email,'Dâu kya')->subject('Thông tin đặt tour từ công ty du lịch lữ hành the travel');
        });
        }
        //-------------------------------------------------------

       if($this->objmPhieudat->add($request,$id,$tienlon,$tienem,$tiennho)){
            if($this->hdao()){
                return $this->hdao();
            }
            else{
                echo "có lỗi";
            }
            //$request->session()->flash('msg','Đặt tour thành công');
            //return redirect()->route('travel.index.index');
       }else{
            echo "lỗi";
            //$request->session()->flash('msg','Đặt tour thất bại');
            //return redirect()->route('travel.index.index');
       }
    }

    //add coment
    public function postAdd(Request $request, $id){
        //$this->objmBinhluan->add($request,$id);
        if(!isset(Auth::user()->id)){
            $request->session()->flash('msg','hi, bạn phải đăng nhập trước khi bình luận');
            return redirect()->route('auth.auth.login');
            die();
        }
        if($this->objmBinhluan->add($request,$id)){
            $request->session()->flash('msg','bình luận thành công');
            return redirect()->route('travel.index.index');
       }else{
            $request->session()->flash('msg','bình luận thất bại');
            return redirect()->route('travel.index.index');
       }
    }

}
