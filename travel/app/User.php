<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Chucvu;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $table = 'users';
    public $primaryKey = 'id';
    public $timestamps = false;
    //lấy all
    public function getItems(){
        return $this->orderBy('id','DESC')
                ->leftjoin('chucvu', 'users.id_cv', '=', 'chucvu.id_cv')
                ->select('chucvu.*', 'users.*')
                ->paginate(getenv('PAGE'));
    }
    //add
    public function add($request,$id_cv){
        $this->ten = $request->ten;
        $this->cmnd = $request->cmnd;
        $this->diachi = $request->diachi;
        $this->sdt = $request->sdt;
        $this->email = $request->email;
        $this->ghichu = $request->ghichu;
        $this->username = $request->username;
        $this->password = bcrypt($request->pass);
        $this->id_cv = $id_cv;
        return $this->save();
    }
    //sua
    public function edit($id,$request){
        return $this->where('id','=',$id)
        ->update([
            'ten' => $request->ten,
            'cmnd' => $request->cmnd,
            'diachi' => $request->diachi,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'ghichu' => $request->ghichu,
            'username' => $request->username,
            'password' => bcrypt($request->pass),
            'id_cv' => $request->chucvu
        ]);
    }
    //xoa
    public function del($id){
        return $this->where('id','=',$id)->delete();
    }
    //lấy 1 tin
    public function getItem($id){
        return $this->findOrFail($id);
    }
    //tìm kiếm tỉnh
    public function search($request){
        $search = $request->search;
        return $this->orderBy('id','DESC')
                ->leftjoin('chucvu', 'users.id_cv', '=', 'chucvu.id_cv')
                ->select('chucvu.*', 'users.*')
                ->where('users.ten','like',"%$search%")
                ->orwhere('users.username','like',"%$search%")
                ->orwhere('chucvu.tencv','like',"%$search%")
                ->paginate(2);
    }
}
