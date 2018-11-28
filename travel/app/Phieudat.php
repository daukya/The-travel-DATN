<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tinh;
use App\Loaitour;
use App\Diadiem;
use App\Chitiettour;
use App\Tour;
class Phieudat extends Model
{
    protected $table = 'phieudat';
    public $primaryKey = 'id_pd';
    public $timestamps = false;

    //lấy 1 phiếu đặt mới nhất để in ra hóa đơn ảo
    public function getItem(){
        return $this->orderBy('phieudat.id_pd','DESC')
            ->leftjoin('chitiettour', 'chitiettour.id_chitiet', '=', 'Phieudat.id_chitiet')
            ->leftjoin('users', 'users.id', '=', 'phieudat.id')
            ->select('users.*','phieudat.*','Chitiettour.*','Phieudat.ghichu as thongtinkh')
            ->where('users.id','=',Auth::user()->id)
            ->take(1)
            ->get();
    }
    //lấy all
    public function getItems(){
    	return $this->orderBy('id_pd','DESC')
            ->leftjoin('users', 'users.id', '=', 'phieudat.id')
            ->select('users.*','phieudat.*')
            ->paginate(2);
    }
    //thêm
    public function add($request,$id,$tienlon,$tienem,$tiennho){
        $this->id = Auth::user()->id;
        $this->id_chitiet = $id;
        $this->ngaydat = date('Y-m-d H:i:s');
        $this->treem = $request->treem;
        $this->trenho = $request->trenho;
        $this->nguoilon = $request->nguoilon;
        $this->trangthai = 0;
        $this->soluongdat = $request->treem + $request->nguoilon;
        $this->ghichu = $request->ghichu;
        $this->thanhtien = $tienlon + $tienem + $tiennho;
        $this->huy = 0;
        return $this->save();
    }
    public function del($id){
    	return $this->where('id_pd','=',$id)->delete();
    }
    //tìm kiếm ngày đặt và tình trạng
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id_pd','DESC')
        ->leftjoin('users', 'users.id', '=', 'phieudat.id')
        ->select('users.*','phieudat.*')
        ->where('phieudat.id_chitiet','like',"%$search%")
        ->orwhere('users.username','like',"%$search%")
        ->orwhere('phieudat.trangthai','like',"%$search%")
        ->paginate(2);
    }
    //lấy 1 id_pd xét duyệt
    public function getIdPD($id){
        return $this->findOrFail($id);
    }
    //duyệt trạng thái phiếu đặt
    public function cNXDPD($id,$tt){
        return $this->where('id_pd','=',$id)
        ->update([
            'trangthai' => $tt
        ]);
    }
    //duyệt trạng thái hủy
    public function cNTTHuy($id,$tt){
        return $this->where('id_pd','=',$id)
        ->update([
            'huy' => $tt
        ]);
    }
}
