@extends('templates.admin.master')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-13">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách tour</h4>
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.tour.search') }}" method="get">
                                	{{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control border-input" placeholder="tìm idct, tenbl" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        	<div class="form-group">
		                                        <input type="submit" name="tk" value="Tìm kiếm" class="is" />
		                                        
	                                        </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{ route('admin.tour.add') }}" class="addtop"><img src="{{ $urlAdmin }}/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" border="1">
                                    <thead>                                      
                                        <th>ID</th>
                                    	<th>Tỉnh / SLTD</th>
                                    	<th>Loại tour</th>
                                    	<th>Phương tiện</th>
                                        <th>Điểm khởi hành</th>
                                        <th>Tên tour/lịch trình</th>
                                        <th>Số ngày/Số đêm</th>
                                        <th>Giá</th>
                                        <th>ghi chú</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($objItems as $key => $objItem)
                                        <tr>
                                        	<td>{{ $objItem->id_tour }}</td>
                                        	<td>
                                                <a href="edit.html">{{ $objItem->tentinh }}</a>
                                                <a href="edit.html">({{ $objItem->sltd }})</a>
                                            </td>
                                        	<td>{{ $objItem->tenlt }}</td>
                                        	<td>{{ $objItem->phuongtien }}</td>
                                            <td>{{ $objItem->diemden }}</td>
                                            <td>
                                                <p>Tên:{{ $objItem->tentour }}</p>
                                                <p>Lt: {{ $objItem->lichtrinh }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $objItem->songay }} Ngày</p>
                                                <p>{{ $objItem->sodem }} Đêm</p>
                                            </td>
                                            <td>
                                                <p>Người lớn: {{ $objItem->gianguoilon }} VNĐ</p>
                                                <p>Trẻ em: {{ $objItem->giatreem }} VNĐ</p>
                                                <p>Trẻ nhỏ: {{ $objItem->giatrenho }} VNĐ</p>
                                            </td>
                                            <td>{{ $objItem->motatour }}</td>
                                        	<td>
                                                <a href="{{ route('admin.tour.edit',['id' => $objItem->id_tour]) }}"><img src="{{ $urlAdmin }}/img/edit.gif" alt="" />Sửa</a>
                                        		<a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{ route('admin.tour.del',['id' => $objItem->id_tour]) }}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
 
                                </table>

								<div class="text-center">
								    <ul class="pagination">
                                        {{ $objItems->appends(Request::all())->links() }}
								    </ul>
								</div>
                            </div>
                        </div>
                    </div>

@stop