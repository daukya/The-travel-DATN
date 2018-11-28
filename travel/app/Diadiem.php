<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tinh;
class Diadiem extends Model
{
    protected $table = 'diadiem';
    public $primaryKey = 'id_dd';
    public $timestamps = false;
    //lấy all
    public function getItems(){
        return $this->orderBy('id_dd','DESC')
                ->leftjoin('tinh', 'tinh.id_tinh', '=', 'diadiem.id_tinh')
                ->select('tinh.*', 'diadiem.*')
                ->paginate(getenv('PAGE'));
    }
    //lấy địa điểm theo tỉnh
    public function getItemsDd(){
        return $this->orderBy('id_dd','DESC')
                ->leftjoin('tinh', 'tinh.id_tinh', '=', 'diadiem.id_tinh')
                ->select('tinh.*', 'diadiem.*')
                //->where('diadiem.tinh','=',$id)
                ->get();
    }
    //add
    public function add($request){
        $this->id_tinh = $request->tinh;
        $this->diemden = $request->diemden;
    	$this->mota = $request->mota;
    	return $this->save();
    }
    //sua
    public function edit($id,$request){
    	return $this->where('id_dd','=',$id)
    	->update([
            'id_tinh' => $request->tinh,
            'diemden' => $request->diemden,
    		'mota' => $request->mota
    	]);
    }
    //xoa
    public function del($id){
    	return $this->where('id_dd','=',$id)->delete();
    }
    //lấy 1 địa điểm
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    //tìm kiếm tỉnh hoặc điểm đến
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id_dd','DESC')
        ->leftjoin('tinh', 'tinh.id_tinh', '=', 'diadiem.id_tinh')
        ->select('tinh.*', 'diadiem.*')
        ->where('tinh.tentinh','like',"%$search%")
        ->orwhere('diadiem.diemden','like',"%$search%")
        ->paginate(2);
    }
    //lấy địa điểm theo tỉnh
    public function getItemDd($id){
        //echo $id;die();
        return $this->orderBy('diadiem.id_dd','DESC')
                ->leftjoin('tinh', 'tinh.id_tinh', '=', 'diadiem.id_tinh')
                ->select('tinh.*', 'diadiem.*')
                ->where('diadiem.id_tinh','=',$id)
                ->get();
    }
}
