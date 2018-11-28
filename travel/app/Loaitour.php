<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitour extends Model
{
 	protected $table = 'loaitour';
    public $primaryKey = 'id_lt';
    public $timestamps = false;
    //lấy all
    public function getItems(){
    	return $this->orderBy('id_lt','DESC')->paginate(2);
    }
    //lấy all k phân trang 
    public function getItemsNP(){
        return $this->orderBy('id_lt','DESC')->get();
    }
    //add
    public function add($request){
    	$this->tenlt = $request->tenlt;
    	return $this->save();
    }
    //sua
    public function edit($id,$request){
    	return $this->where('id_lt','=',$id)
    	->update([
    		'tenlt' => $request->tenlt
    	]);
    }
    //xoa
    public function del($id){
    	return $this->where('id_lt','=',$id)->delete();
    }
    //tìm kiếm tên
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id_lt','DESC')
                ->select('loaitour.*')
                ->where('tenlt','like',"%$search%")
                ->paginate(2);
    }
    //lấy 1 tin
    public function getItem($id){
    	return $this->findOrFail($id);
    }
}
