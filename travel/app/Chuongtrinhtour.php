<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tour;
class Chuongtrinhtour extends Model
{
   	protected $table = 'chuongtrinhtour';
    public $primaryKey = 'id_chuongtrinh';
    public $timestamps = false;
    //lấy all
    public function getItems(){
        return $this->orderBy('tour.id_tour','DESC')
                ->leftjoin('tour', 'tour.id_tour', '=', 'chuongtrinhtour.id_tour')
                ->select('tour.*', 'chuongtrinhtour.*')
                ->paginate(7);
    }
    //lấy chương trình của 1 tour
    public function getItemsCT($id_tour){
        //echo $id_tour;die();
        return $this->orderBy('Chuongtrinhtour.id_chuongtrinh','ASC')
                ->select('chuongtrinhtour.*')
                ->where('Chuongtrinhtour.id_tour','=',$id_tour)
                ->get();

    }
    //add
    public function add($request){
        $this->id_tour = $request->tour;
        $this->tieude = $request->tieude;
    	$this->ngaythu = $request->ngaythu;
    	$this->mota = $request->mota;
    	return $this->save();

    }
    //sua
    public function edit($id,$request){
    	return $this->where('id_chuongtrinh','=',$id)
    	->update([
            'id_tour' => $request->tour,
            'tieude' => $request->tieude,
    		'ngaythu' => $request->ngaythu,
    		'mota' => $request->mota
    	]);
    }
    //xoa
    public function del($id){
    	return $this->where('id_chuongtrinh','=',$id)->delete();
    }
    //lấy 1 chương trình tour theo id_chuongtrinh
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    //tìm kiếm tên tour ngày thứ 
    public function search($request){
        $search = $request->search;
        return $this->orderBy('tour.id_tour','DESC')
        ->leftjoin('tour', 'tour.id_tour', '=', 'chuongtrinhtour.id_tour')
        ->select('tour.*', 'chuongtrinhtour.*')
        ->where('tour.tentour','like',"%$search%")
        ->orwhere('chuongtrinhtour.ngaythu','like',"%$search%")
        ->paginate(2);
    }
}
