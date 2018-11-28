<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Tour;
use App\Phieudat;
class Chitiettour extends Model
{
 	protected $table = 'chitiettour';
    public $primaryKey = 'id_chitiet';
    public $timestamps = false;
    //lấy all
    public function getItems(){
        //return $this->orderBy('id_chitiet','DESC')->paginate(2);
        return $this->orderBy('chitiettour.id_chitiet','DESC')
        ->leftjoin('tour', 'tour.id_tour', '=', 'chitiettour.id_tour')
        ->leftjoin('users', 'users.id', '=', 'chitiettour.id')
        ->select('tour.*', 'Chitiettour.*','users.*')
        ->paginate(2);
    }
    //add
    public function add($request,$ngaydi,$ngayve,$picture){
        $objmTour = new Tour();
        $sltd = $objmTour->getItem($request->tour)->sltd;
        $this->id_tour = $request->tour;
        $this->ngaydi = $ngaydi;
        $this->ngayve = $ngayve;
        $this->soluongcon = $sltd;
        $this->ghichu = $request->ghichu;
        $this->hinhanh = $picture;
        $this->id = Auth::user()->id;
        return $this->save();
    }
    //sua
    public function edit($id,$request,$ngaydi,$ngayve,$picture){
        $objmTour = new Tour();
        $sltd = $objmTour->getItem($request->tour)->sltd;
        return $this->where('id_chitiet','=',$id)
        ->update([
	        'id_tour' => $request->tour,
	        'ngaydi' => $request->ngaydi,
	        'ngayve' => $request->ngayve,
	        'soluongcon' => $sltd,
            'hinhanh' => $picture,
            'ghichu' => $request->ghichu,
	        'id' => Auth::user()->id
        ]);
    }
    //xoa
    public function del($id){
        return $this->where('id_chitiet','=',$id)->delete();
    }
    //lấy 1 tin
    public function getItem($id){
        return $this->findOrFail($id);
    }
    //cập nhật số lượng còn của q tour chi tiết
    public function cnSLC($id,$slc,$sld){
        return $this->where('id_chitiet','=',$id)
        ->update([
            'soluongcon' => $slc - $sld
        ]);
    }
    //tìm kiếm tên tour, ngày đi, ngày về, số lượng còn
    public function search($request){
        $search = $request->search;
        return $this->orderBy('chitiettour.id_chitiet','DESC')
        ->leftjoin('users', 'users.id', '=', 'chitiettour.id')
        ->leftjoin('tour', 'tour.id_tour', '=', 'chitiettour.id_tour')
        ->select('tour.*', 'Chitiettour.*','users.*')
        ->where('tour.tentour','like',"%$search%")
        ->orwhere('Chitiettour.ngaydi','like',"%$search%")
        ->orwhere('Chitiettour.ngayve','like',"%$search%")
        ->orwhere('Chitiettour.soluongcon','like',"%$search%")
        ->paginate(2);
    }
    //hàm update cộng thêm số lượng còn khi nhấn hủy
    public function alterSLC($id_chitiet,$slHuy){
        return $this->where('id_chitiet','=',$id_chitiet)
        ->update([
            'soluongcon' => $slHuy
        ]);
    }
    //cập nhật lại số lượng khi có hủy pđ tìm id chiết tiết
    public function cnslHuy($id_chitiet,$slhuy){
     $slHuy =  $this->getItem($id_chitiet)->soluongcon + $slhuy;
     return $this->alterSLC($id_chitiet,$slHuy);
    }

}
