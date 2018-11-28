@extends('templates.admin.master')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách địa điểm</h4>
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.diadiem.search') }}" method="get">
                                    {{ csrf_field()}}
                                	<div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="search" class="form-control border-input" placeholder="tìm " value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        	<div class="form-group">
		                                        <input type="submit" name="tk" value="Tìm kiếm" class="is" />
		                                        
	                                        </div>
                                        </div>
                                    </div>
                                    
                                </form>
                                
                                <a href="{{ route('admin.diadiem.add') }}" class="addtop"><img src="{{ $urlAdmin }}/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" border="1">
                                    <thead>
                                        <th>ID</th>
                                        <th>Tỉnh</th>
                                        <th>Điểm đến</th>
                                    	<th>Mô tả</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($objItems as $key => $objItem)
                                        <tr>
                                            <td>{{ $objItem->id_dd }}</td>
                                            <td>{{ $objItem->tentinh }}</td>
                                            <td>{{ $objItem->diemden }}</td>
                                        	<td>{{ $objItem->mota }}</td>
                                        	<td>
                                        		<a href="{{ route('admin.diadiem.edit',['id' => $objItem->id_dd]) }}"><img src="{{ $urlAdmin }}/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                        		<a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{ route('admin.diadiem.del',['id' => $objItem->id_dd]) }}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /> Xóa</a>
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