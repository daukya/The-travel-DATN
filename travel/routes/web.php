<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//gửi mail
Route::get('mailsend', function () {
    return view('mailsend.blade.php');
});
Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function(){
	Route::get('/',[
		'uses' => 'IndexController@index',
		'as' => 'admin.index.index'
	])->middleware('role:admin|tinhle');
	Route::prefix('phieudat')->group(function(){
		Route::get('/',[
			'uses' => 'PhieudatController@index',
			'as' => 'admin.phieudat.index'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'PhieudatController@del',
			'as' => 'admin.phieudat.del'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'PhieudatController@search',
			'as' => 'admin.phieudat.search'
		])->middleware('role:admin|tinhle');
	});
//3. tour
	Route::prefix('tour')->group(function(){
		Route::get('/',[
			'uses' => 'TourController@index',
			'as' => 'admin.tour.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'TourController@getAdd',
			'as' => 'admin.tour.add'
		])->middleware('role:admin');
		Route::get('edit-{id}',[
			'uses' => 'TourController@getEdit',
			'as' => 'admin.tour.edit'
		])->middleware('role:admin');
		Route::get('del-{id}',[
			'uses' => 'TourController@del',
			'as' => 'admin.tour.del'
		])->middleware('role:admin');
		Route::post('add',[
			'uses' => 'TourController@postAdd',
			'as' => 'admin.tour.add'
		])->middleware('role:admin');
		Route::post('edit-{id}',[
			'uses' => 'TourController@postEdit',
			'as' => 'admin.tour.edit'
		])->middleware('role:admin');
		Route::get('search',[
			'uses' => 'TourController@search',
			'as' => 'admin.tour.search'
		])->middleware('role:admin|tinhle');
	});
//4. tour chi tiết
	Route::prefix('chitiettour')->group(function(){
		Route::get('/',[
			'uses' => 'ChitietController@index',
			'as' => 'admin.chitiettour.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'ChitietController@getAdd',
			'as' => 'admin.chitiettour.add'
		])->middleware('role:admin|tinhle');
		Route::get('edit-{id}',[
			'uses' => 'ChitietController@getEdit',
			'as' => 'admin.chitiettour.edit'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'ChitietController@del',
			'as' => 'admin.chitiettour.del'
		])->middleware('role:admin|tinhle');
		Route::post('add',[
			'uses' => 'ChitietController@postAdd',
			'as' => 'admin.chitiettour.add'
		])->middleware('role:admin|tinhle');
		Route::post('edit-{id}',[
			'uses' => 'ChitietController@postEdit',
			'as' => 'admin.chitiettour.edit'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'ChitietController@search',
			'as' => 'admin.chitiettour.search'
		])->middleware('role:admin|tinhle');
	});	
//5. chương trình tour
	Route::prefix('chuongtrinhtour')->group(function(){
		Route::get('/',[
			'uses' => 'ChuongtrinhController@index',
			'as' => 'admin.chuongtrinhtour.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'ChuongtrinhController@getAdd',
			'as' => 'admin.chuongtrinhtour.add'
		])->middleware('role:admin');
		Route::get('edit-{id}',[
			'uses' => 'ChuongtrinhController@getEdit',
			'as' => 'admin.chuongtrinhtour.edit'
		])->middleware('role:admin');
		Route::get('del-{id}',[
			'uses' => 'ChuongtrinhController@del',
			'as' => 'admin.chuongtrinhtour.del'
		])->middleware('role:admin');
		Route::post('add',[
			'uses' => 'ChuongtrinhController@postAdd',
			'as' => 'admin.chuongtrinhtour.add'
		])->middleware('role:admin');
		Route::post('edit-{id}',[
			'uses' => 'ChuongtrinhController@postEdit',
			'as' => 'admin.chuongtrinhtour.edit'
		])->middleware('role:admin');
		Route::get('search',[
			'uses' => 'ChuongtrinhController@search',
			'as' => 'admin.chuongtrinhtour.search'
		])->middleware('role:admin|tinhle');
	});
//6. hóa đơn
	Route::prefix('hoadon')->group(function(){
		Route::get('/',[
			'uses' => 'HoadonController@index',
			'as' => 'admin.hoadon.index'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'HoadonController@del',
			'as' => 'admin.hoadon.del'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'HoadonController@search',
			'as' => 'admin.hoadon.search'
		])->middleware('role:admin|tinhle');
	});
//7. bình luận
	Route::prefix('binhluan')->group(function(){
		Route::get('/',[
			'uses' => 'BinhluanController@index',
			'as' => 'admin.binhluan.index'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'BinhluanController@del',
			'as' => 'admin.binhluan.del'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'BinhluanController@search',
			'as' => 'admin.binhluan.search'
		])->middleware('role:admin|tinhle');
		Route::post('delmore',[
			'uses' => 'BinhluanController@delmore',
			'as' => 'admin.binhluan.delmore'
		])->middleware('role:admin|tinhle');
	});
//8. chức vụ
	Route::prefix('chucvu')->group(function(){
		Route::get('/',[
			'uses' => 'ChucvuController@index',
			'as' => 'admin.chucvu.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'ChucvuController@getAdd',
			'as' => 'admin.chucvu.add'
		])->middleware('role:admin');
		Route::get('edit-{id}',[
			'uses' => 'ChucvuController@getEdit',
			'as' => 'admin.chucvu.edit'
		])->middleware('role:admin');
		Route::get('del-{id}',[
			'uses' => 'ChucvuController@del',
			'as' => 'admin.chucvu.del'
		])->middleware('role:admin');
		Route::post('add',[
			'uses' => 'ChucvuController@postAdd',
			'as' => 'admin.chucvu.add'
		])->middleware('role:admin');
		Route::post('edit-{id}',[
			'uses' => 'ChucvuController@postEdit',
			'as' => 'admin.chucvu.edit'
		])->middleware('role:admin');
		Route::get('search',[
			'uses' => 'ChucvuController@search',
			'as' => 'admin.chucvu.search'
		])->middleware('role:admin|tinhle');
	});
//9. tỉnh
	Route::prefix('tinh')->group(function(){
		Route::get('/',[
			'uses' => 'TinhController@index',
			'as' => 'admin.tinh.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'TinhController@getAdd',
			'as' => 'admin.tinh.add'
		])->middleware('role:admin|tinhle');
		Route::get('edit-{id}',[
			'uses' => 'TinhController@getEdit',
			'as' => 'admin.tinh.edit'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'TinhController@del',
			'as' => 'admin.tinh.del'
		])->middleware('role:admin|tinhle');
		Route::post('add',[
			'uses' => 'TinhController@postAdd',
			'as' => 'admin.tinh.add'
		])->middleware('role:admin|tinhle');
		Route::post('edit-{id}',[
			'uses' => 'TinhController@postEdit',
			'as' => 'admin.tinh.edit'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'TinhController@search',
			'as' => 'admin.tinh.search'
		])->middleware('role:admin|tinhle');
	});
//10. địa điểm
	Route::prefix('diadiem')->group(function(){
		Route::get('',[
			'uses' => 'DiadiemController@index',
			'as' => 'admin.diadiem.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'DiadiemController@getAdd',
			'as' => 'admin.diadiem.add'
		])->middleware('role:admin|tinhle');
		Route::get('edit-{id}',[
			'uses' => 'DiadiemController@getEdit',
			'as' => 'admin.diadiem.edit'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'DiadiemController@del',
			'as' => 'admin.diadiem.del'
		])->middleware('role:admin|tinhle');
		Route::post('add',[
			'uses' => 'DiadiemController@postAdd',
			'as' => 'admin.diadiem.add'
		])->middleware('role:admin|tinhle');
		Route::post('edit-{id}',[
			'uses' => 'DiadiemController@postEdit',
			'as' => 'admin.diadiem.edit'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'DiadiemController@search',
			'as' => 'admin.diadiem.search'
		])->middleware('role:admin|tinhle');
	});
//11. loại tour
	Route::prefix('loaitour')->group(function(){
		Route::get('',[
			'uses' => 'LoaitourController@index',
			'as' => 'admin.loaitour.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'LoaitourController@getAdd',
			'as' => 'admin.loaitour.add'
		])->middleware('role:admin');
		Route::get('edit-{id}',[
			'uses' => 'LoaitourController@getEdit',
			'as' => 'admin.loaitour.edit'
		])->middleware('role:admin');
		Route::get('del-{id}',[
			'uses' => 'LoaitourController@del',
			'as' => 'admin.loaitour.del'
		])->middleware('role:admin');
		Route::post('add',[
			'uses' => 'LoaitourController@postAdd',
			'as' => 'admin.loaitour.add'
		])->middleware('role:admin');
		Route::post('edit-{id}',[
			'uses' => 'LoaitourController@postEdit',
			'as' => 'admin.loaitour.edit'
		])->middleware('role:admin');
		Route::get('search',[
			'uses' => 'LoaitourController@search',
			'as' => 'admin.loaitour.search'
		])->middleware('role:admin|tinhle');
	});
//12. usesr
	Route::prefix('user')->group(function(){
		Route::get('/',[
			'uses' => 'UsersController@index',
			'as' => 'admin.users.index'
		])->middleware('role:admin|tinhle');
		Route::get('add',[
			'uses' => 'UsersController@getAdd',
			'as' => 'admin.users.add'
		])->middleware('role:admin');
		Route::get('edit-{id}',[
			'uses' => 'UsersController@getEdit',
			'as' => 'admin.users.edit'
		])->middleware('role:admin|tinhle');
		Route::get('del-{id}',[
			'uses' => 'UsersController@del',
			'as' => 'admin.users.del'
		])->middleware('role:admin');
		Route::post('add',[
			'uses' => 'UsersController@postAdd',
			'as' => 'admin.users.add'
		])->middleware('role:admin');
		Route::post('edit-{id}',[
			'uses' => 'UsersController@postEdit',
			'as' => 'admin.users.edit'
		])->middleware('role:admin|tinhle');
		Route::get('search',[
			'uses' => 'UsersController@search',
			'as' => 'admin.users.search'
		])->middleware('role:admin|tinhle');
	});
});

//-----------------------  Ajax  ------------------------------
Route::namespace('Ajax')->group(function(){
	//duyệt bình luận
	Route::get('setActive',[
			'uses' => 'AjaxController@xlactivebl',
			'as' => 'ajax.ajax.xlbl'
		]);
	//duyệt phiếu đặt
	Route::get('duyetpd',[
			'uses' => 'AjaxController@duyetpd',
			'as' => 'ajax.ajax.duyetpd'
	]);
	//tình trạng hủy của phiếu đặt
	Route::get('huy',[
			'uses' => 'AjaxController@huypd',
			'as' => 'ajax.ajax.huypd'
	]);
	//tình trạng duyệt hóa đơn đã thanh toán chưa thanh toán
	Route::get('duyet-thanh-toan',[
			'uses' => 'AjaxController@duyethd',
			'as' => 'ajax.ajax.duyethd'
	]);
	//chọn tỉnh show ra địa điểm tương ứng
	Route::get('xldd',[
			'uses' => 'AjaxController@xulydd',
			'as' => 'ajax.ajax.xldd'
	]);

	
});

//-----------------------  public -----------------------------
Route::namespace('Travel')->group(function(){

	Route::get('trang-chu',[
		'uses' => 'IndexController@index',
		'as' => 'travel.index.index'
	]);
	Route::get('tim-kiem',[
		'uses' => 'IndexController@timkiem',
		'as' => 'travel.index.timkiem'
	]);
	//Route::prefix('tour')->group(function(){
		Route::get('loaitour/{id}/{slugt}',[
			'uses' => 'TourController@index',
			'as' => 'travel.tour.index'
		]);
		//chi tiết
		Route::get('{slug}/{id}.html',[
			'uses' => 'TourController@detail',
			'as' => 'travel.tour.detail'
		]);
		//cập nhật phiếu đặt
		Route::get('dat-{id}-{slug}',[
			'uses' => 'TourController@getPhieudat',
			'as' => 'travel.tour.phieudat'
		]);
		Route::post('dat-{id}-{slug}',[
			'uses' => 'TourController@postPhieudat',
			'as' => 'travel.tour.phieudat'
		]);	
		Route::get('hoa-don-ao',[
			'uses' => 'TourController@hdao',
			'as' => 'travel.tour.hdao'
		]);
		Route::post('bl-{id}',[
			'uses' => 'TourController@postAdd',
			'as' => 'travel.tour.binhluan'
		]);
	//});	
	//đăng kí
	Route::prefix('dangki')->group(function(){
		Route::get('/',[
			'uses' => 'DangkiController@getDangKi',
			'as' => 'travel.dangki.dangki'
		]);
		Route::post('/',[
			'uses' => 'DangkiController@postDangKi',
			'as' => 'travel.dangki.dangki'
		]);	
	});
	//cập nhật thông tin
	Route::prefix('taikhoan-{id}')->group(function(){
		Route::get('/',[
			'uses' => 'DangkiController@getEdit',
			'as' => 'travel.dangki.edit'
		]);
		Route::post('/',[
			'uses' => 'DangkiController@postEdit',
			'as' => 'travel.dangki.edit'
		]);	
	});
	Route::get('lienhe',[
			'uses' => 'LienheController@index',
			'as' => 'travel.lienhe.index'
		]);
	//add hàng
	Route::get('them-{slug}/{id}',[
			'uses' => 'GiohangController@add',
			'as' => 'travel.giohang.add'
	]);
	//index giỏ
	Route::get('gio-hang',[
			'uses' => 'GiohangController@index',
			'as' => 'travel.giohang.index'
	]);
	//xóa 1 tour trong giỏ
	Route::get('xoa-{rowId}',[
			'uses' => 'GiohangController@remove',
			'as' => 'travel.giohang.remove'
	]);
	//xóa hết tour trong giỏ
	Route::get('xoahet',[
			'uses' => 'GiohangController@delall',
			'as' => 'travel.giohang.delall'
	]);
});

	//đăng nhập
	Route::namespace('Auth')->group(function(){
		Route::get('dangnhap/',[
			'uses' => 'AuthController@getLogin',
			'as' => 'auth.auth.login'
		]);
		Route::post('dangnhap/',[
			'uses' => 'AuthController@postLogin',
			'as' => 'auth.auth.login'
		]);
		Route::get('dangxuat/',[
			'uses' => 'AuthController@logOut',
			'as' => 'auth.auth.logout'
		]);
	});
Route::get('/404',function(){
	return view('404');
});