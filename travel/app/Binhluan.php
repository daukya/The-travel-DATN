<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\chitiettour;
class Binhluan extends Model
{
 
    protected $table = 'binhluan';
    public $primaryKey = 'id_bl';
    public $timestamps = false;

    //lấy all
    public function getItems(){
    	return $this->orderBy('id_bl','DESC')
        ->leftjoin('chitiettour', 'chitiettour.id_chitiet', '=', 'Binhluan.id_chitiet')
        ->select('Chitiettour.*', 'binhluan.*')
        ->paginate(5);
    }
    public function del($id){
    	return $this->where('id_bl','=',$id)->delete();
    }
    //tìm kiếm id chitiet hay là tên người bình luận
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id_bl','DESC')
                ->select('binhluan.*')
                ->where('id_chitiet','like',"%$search%")
                ->orwhere('ten','like',"%$search%")
                ->paginate(2);
    }
    //add
    public function add($request,$id){
        $this->id_chitiet = $id;
        $this->ten = Auth::user()->ten;
        $this->noidung = $request->noidung;
        $this->trangthai = 0;
        $this->ngaygio = date('Y-m-d H:i:s');
        return $this->save();
    }
    public function getItem($id){
        return $this->findOrFail($id);
    }
    //cập nhật trạng thái bình luận
    public function cNTTBL($id,$tt){
        return $this->where('id_bl','=',$id)
        ->update([
            'trangthai' => $tt
        ]);
    }
    //hiển thị bình luận ra public 
    public function getItemsBL($id){
        //echo $id; die();
        return $this->orderBy('id_bl','DESC')
        ->where('id_chitiet','=',$id)
        ->where('trangthai','=',1)
        ->take(4)
        ->get();
    }
}
