<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table = 'hoadon';
    public $primaryKey = 'id_hd';
    public $timestamps = false;
    //xóa tự động khi ngày hiện tại bằng ngày thanh toán nhưng tình trạng thanh toán = 0
    public function xoaTD(){
        $date = date('Y-m-d');
        //echo $date;die();
        return $this->where('tinhtrang','=',0)->where('ngaythanhtoan','=',$date)->get();
    }
    //lấy all
    public function getItems(){
    	return $this->orderBy('id_hd','DESC')->paginate(2);
    }
    public function del($id){
    	return $this->where('id_hd','=',$id)->delete();
    }
    //tìm kiếm idpd và ngày thanh toán
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id_hd','DESC')
        ->select('hoadon.*')
        ->where('id_pd','like',"%$search%")
        ->orwhere('id_hd','like',"%$search%")
        ->orwhere('ngaythanhtoan','like',"%$search%")
        ->paginate(2);
    }
    //lấy 1 hóa đơn
    public function getItem($id){
        return $this->findOrFail($id);
    }
    //add
    public function add($id,$thanhtien){
        $this->id_pd = $id;
        $dateint  = mktime(0, 0, 0, date("m"), date("d")+2, date("y"));
        $this->ngaythanhtoan = date('y-m-d', $dateint); // 02/12/2016
        $this->tinhtrang = 0;
        $this->tongtien = $thanhtien;
        return $this->save();
    }
    //xóa hóa đơn có id_pd đổi sang trạng thái chưa xét duyệt
    public function delXD($id){
        return $this->where('id_pd','=',$id)->delete();
    }
    //cập nhật khi đã thanh toán
    public function cNTT($id,$tt){
        return $this->where('id_hd','=',$id)
        ->update([
            'tinhtrang' => $tt,
        ]);
    }
}
