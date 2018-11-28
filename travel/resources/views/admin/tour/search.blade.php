@extends('templates.admin.master')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách tour</h4>
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.tour.search') }}" method="get">
                                	{{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control border-input" placeholder="tìm idct, tenbl" value="{{ $request->search }}">
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
                                        <th>Tỉnh</th>
                                    	<th>Khởi hành</th>
                                    	<th>Loại tour</th>
                                    	<th>Phương tiện</th>
                                        <th>SLTD</th>
                                        <th>Tên tour/lịch trình</th>
                                        <th>Số ngày/Số đêm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>ghi chú</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($objItems as $key => $objItem)
                                        <tr>
                                        	<td>{{ $objItem->id_tour }}</td>
                                        	<td><a href="edit.html">{{ $objItem->tentinh }}</a></td>
                                            <td>{{ $objItem->diemden }}</td>
                                        	<td>{{ $objItem->tenlt }}</td>
                                        	<td>{{ $objItem->phuongtien }}</td>
                                            <td>{{ $objItem->sltd }}</td>
                                            <td>
                                                <p>Tên:{{ $objItem->tentour }}</p>
                                                <p>Lt: {{ $objItem->lichtrinh }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $objItem->songay }} Ngày</p>
                                                <p>{{ $objItem->sodem }} Đêm</p>
                                            </td>
                                            <td><img width="100px" src="/storage/app/files/{{ $objItem->hinhanh }}" alt="" /></td>
                                            <td>
                                                <p>Người lớn: {{ $objItem->gianguoilon }} VNĐ</p>
                                                <p>Trẻ em: {{ $objItem->giatreem }} VNĐ</p>
                                                <p>Trẻ nhỏ: {{ $objItem->giatrenho }} VNĐ</p>
                                            </td>
                                            <td>{{ $objItem->ghichu }}</td>
                                        	<td>
                                                <a href="{{ route('admin.tour.edit',['id' => $objItem->id_tour]) }}"><img src="{{ $urlAdmin }}/img/edit.gif" alt="" />Sửa</a>
                                        		<a href="{{ route('admin.tour.del',['id' => $objItem->id_tour]) }}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /> Xóa</a>
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