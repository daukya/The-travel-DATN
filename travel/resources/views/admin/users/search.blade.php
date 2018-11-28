@extends('templates.admin.master')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách tài khoản</h4>
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.users.search') }}" method="get">
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
                                
                                <a href="{{ route('admin.users.add') }}" class="addtop"><img src="{{ $urlAdmin }}/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" border="1">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Tên</th>
                                    	<th>Cmnd</th>
                                    	<th>Địa chỉ</th>
                                        <th>SDT</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Chức vụ</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($objItems as $key => $objItem)
                                        <tr>
                                        	<td>{{ $objItem->id }}</td>
                                        	<td><a href="edit.html">{{ $objItem->ten }}</a></td>
                                        	<td>{{ $objItem->cmnd }}</td>
                                        	<td>{{ $objItem->diachi }}</td>
                                            <td>{{ $objItem->sdt }}</td>
                                            <td>{{ $objItem->email }}</td>
                                            <td>{{ $objItem->username }}</td>
                                            <td>{{ $objItem->tencv }}</td>
                                        	<td>
                                                <a href="{{ route('admin.users.edit',['id' => $objItem->id]) }}"><img src="{{ $urlAdmin }}/img/edit.gif" alt="" />Sửa</a>
                                        		<a href="{{ route('admin.users.del',['id' => $objItem->id]) }}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /> Xóa</a>
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