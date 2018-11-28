<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
 	protected $table = 'tinh';
    public $primaryKey = 'id_tinh';
    public $timestamps = false;
    //lấy all
    public function getItems(){
    	return $this->orderBy('id_tinh','DESC')->paginate(2);
    }
    //lấy all k phân trang
    public function getItemsNP(){
        return $this->orderBy('id_tinh','DESC')->get();
    }
    //add
    public function add($request){
    	$this->tentinh = $request->tentinh;
    	return $this->save();
    }
    //sua
    public function edit($id,$request){
    	return $this->where('id_tinh','=',$id)
    	->update([
    		'tentinh' => $request->tentinh
    	]);
    }
    //xoa
    public function del($id){
    	return $this->where('id_tinh','=',$id)->delete();
    }
    //lấy 1 tin
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    //tìm kiếm tỉnh
    public function tk($request){
        $search = $request->search;
        return $this->orderBy('id_tinh','DESC')
                ->select('tinh.*')
                ->where('tentinh','like',"%$search%")
                ->paginate(2);
    }
}
