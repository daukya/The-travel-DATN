<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chucvu extends Model
{

	protected $table = 'chucvu';
    public $primaryKey = 'id_cv';
    public $timestamps = false;
    //lấy all có phân trang
    public function getItems(){
    	return $this->orderBy('id_cv','DESC')->paginate(2);
    }
    //lấy all không có phân trang
    public function getItemsNP(){
        return $this->orderBy('id_cv','DESC')->get();
    }
    //add
    public function add($request){
    	$this->tencv = $request->tencv;
    	return $this->save();
    }
    //sua
    public function edit($id,$request){
    	return $this->where('id_cv','=',$id)
    	->update([
    		'tencv' => $request->tencv
    	]);
    }
    //xoa
    public function del($id){
    	return $this->where('id_cv','=',$id)->delete();
    }
    //lấy 1 tin
    public function getItem($id){
    	return $this->findOrFail($id);
    }
    //tìm kiếm tỉnh
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id_cv','DESC')
                ->select('chucvu.*')
                ->where('tencv','like',"%$search%")
                ->paginate(2);
    }
}
