<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tinh;
use App\Loaitour;
use App\Diadiem;
use App\Chitiettour;
class Tour extends Model
{
    protected $table = 'Tour';
    public $primaryKey = 'id_tour';
    public $timestamps = false;
    //lấy all
    public function getItems(){
        return $this->orderBy('tour.id_tour','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*')
            ->paginate(getenv('PAGE'));
    }
    //lấy chi tiết 1 tin ra public
    public function getItemPL($id){
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('Chitiettour.id_chitiet','=',$id)
            ->get(); 
    }
    //3 tour liên quan
    public function get3ItemLQ($id,$id_chitiet){
        //echo $id;die();
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',$id)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->where('chitiettour.id_chitiet','<>',$id_chitiet)
            ->take(3)
            ->get(); 
    }
    //lấy tour hàng đầu public
    public function getItemsHD(){
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',6)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->where('Chitiettour.soluongcon','>',0)
            ->take(6)
            ->get(); 
    }
    //lấy 1 tour nổi bật 
    public function getItem1NB(){
            return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',4)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->take(1)
            ->get();  
    }    
    //lấy 4 tour nổi bật xung quanh pl
    public function getItemsNB($id){
            return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',4)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->where('Chitiettour.id_chitiet','<>',$id)
            ->where('Chitiettour.soluongcon','>',0)
            ->take(4,2)
            ->get();  
    }

    //lấy tour sự kiện
    public function getItemsSK(){
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',3)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->where('Chitiettour.soluongcon','>',0)
            ->take(6)
            ->get(); 
    }
    //lấy tour yêu thích
    public function getItemsYT(){
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->leftjoin('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->leftjoin('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->leftjoin('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->leftjoin('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',5)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->where('Chitiettour.soluongcon','>',0)
            ->take(6)
            ->get(); 
    }  

    //lấy ra public tour loại tour 
    public function getItemsPL($id){
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('tour.id_lt','=',$id)
            ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
            ->paginate(getenv('PAGE')); 
    }  
    //lấy all k phân trang
    public function getItemsNP(){
        return $this->orderBy('tour.id_tour','DESC')
        ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
        ->select('loaitour.*','tour.*')
        ->get();
    }
    //add
    public function add($request){
        $this->id_tinh = $request->tinh;
        $this->id_dd = $request->diadiem;
        $this->id_lt = $request->loaitour;
        $this->phuongtien = $request->pt;
        $this->sltd = $request->sltd;
        $this->tentour = $request->tentour;
        $this->songay = $request->songay;
        $this->sodem = $request->sodem;
        $this->gianguoilon = $request->gialon;
        $this->giatreem = $request->giaem;
        $this->giatrenho = $request->gianho;
        $this->motatour = $request->ghichu;
        $this->lichtrinh = $request->lichtrinh;
        $this->bando = $request->bando;
        return $this->save();
    }
    //sua
    public function edit($id,$request){
        return $this->where('id_tour','=',$id)
        ->update([
            'id_tinh' => $request->tinh,
	        'id_dd' => $request->diadiem,
	        'id_lt' => $request->loaitour,
	        'phuongtien' => $request->pt,
	        'sltd' => $request->sltd,
	        'tentour' => $request->tentour,
	        'songay' => $request->songay,
	        'sodem' => $request->sodem,
	        'gianguoilon' => $request->gialon,
	        'giatreem' => $request->giaem,
	        'giatrenho' => $request->gianho,
            'motatour' => $request->ghichu,
            'lichtrinh' => $request->lichtrinh,
	        'bando' => $request->bando
        ]);
    }
    //xoa
    public function del($id){
        return $this->where('id_tour','=',$id)->delete();
    }
    //lấy 1 tin
    public function getItem($id){
        return $this->findOrFail($id);
    }
    //tìm kiếm tỉnh với lịch trình
    public function search($request){
        $search = $request->search;
        //echo $search;die();
        return $this->orderBy('id_tour','DESC')
        ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
        ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
        ->leftjoin('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
        ->select('loaitour.*','tour.*','tinh.*','diadiem.*')
        ->where('tour.tentour','like',"%$search%")
        ->orwhere('tinh.tentinh','like',"%$search%")
        ->orwhere('tour.lichtrinh','like',"%$search%")
        ->orwhere('tour.gianguoilon','like',"%$search%")
        ->orwhere('tour.giatreem','like',"%$search%")
        ->orwhere('tour.giatrenho','like',"%$search%")
        ->orwhere('loaitour.tenlt','like',"%$search%")
        ->paginate(2);
    }
    //tìm kiếm public ngày đi, tên tour, lịch trình, giá, tên tỉnh
    // public function tk($request){
    //     $search = $request->tk;
    //     return $this->orderBy('chitiettour.id_chitiet','DESC')
    //         ->join('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
    //         ->join('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
    //         ->join('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
    //         ->join('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
    //         ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
    //         ->where('chitiettour.ngaydi','>',date("Y-m-d H:i:s"))
    //         ->where('tour.tentour','like',"%$search%")
    //         ->orwhere('tour.lichtrinh','like',"%$search%")
    //         ->orwhere('tour.gianguoilon','like',"%$search%")
    //         ->orwhere('tour.giatreem','like',"%$search%")
    //         ->orwhere('tour.giatrenho','like',"%$search%")           
    //         ->orwhere('chitiettour.ngaydi','like',"%$search%")           
    //         ->orwhere('tinh.tentinh','like',"%$search%")
    //         ->orwhere('diadiem.diemden','like',"%$search%")           
    //         ->paginate(getenv('PAGE')); 
    // }
    public function tk($request){
        $search = $request->tk;
        return $this->orderBy('chitiettour.id_chitiet','DESC')
            ->leftjoin('tinh', 'tour.id_tinh', '=', 'tinh.id_tinh')
            ->leftjoin('diadiem', 'tour.id_dd', '=', 'diadiem.id_dd')
            ->leftjoin('loaitour', 'loaitour.id_lt', '=', 'tour.id_lt')
            ->leftjoin('chitiettour', 'chitiettour.id_tour', '=', 'tour.id_tour')
            ->select('loaitour.*','tour.*','tinh.*','diadiem.*','chitiettour.*')
            ->where('chitiettour.ngaydi','>=',date("Y-m-d H:i:s"))
            ->where(function ($querya) use ($search) {
                $querya->where('tour.tentour', 'like', "%$search%")
                ->orwhere('tour.lichtrinh', 'like', "%$search%")
                ->orwhere('tour.gianguoilon', 'like', "%$search%")
                ->orwhere('tour.giatreem', 'like', "%$search%")
                ->orwhere('chitiettour.ngaydi', 'like', "%$search%")
                ->orwhere('tinh.tentinh', 'like', "%$search%")
                ->orwhere('diadiem.diemden','like',"%$search%");           
            })
            ->paginate(getenv('PAGE'));
    }
}
