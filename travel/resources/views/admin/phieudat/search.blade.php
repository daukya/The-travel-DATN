@extends('templates.admin.master')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Phiếu đặt</h4>
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.phieudat.search') }}" method="get">
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
                                
                                <a href="edit.html" class="addtop"><img src="{{ $urlAdmin }}/img/add.png" alt="" /> Thêm</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" border="1">
                                    <thead>
                                        <th>ID_PD</th>
                                        <th>ID_ChiTiet</th>
                                    	<th>Tài khoản</th>
                                    	<th>Ngày đặt</th>
                                        <th>Trẻ em</th>
                                        <th>Trẻ nhỏ</th>
                                        <th>Người lớn</th>
                                    	<th>Tổng người</th>
                                        <th>Duyệt</th>
                                        <th>Hủy</th>
                                        <th>Ghi chú</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($objItems as $key => $objItem)
                                        <tr>
                                        	<td>{{ $objItem->id_pd }}</td>
                                        	<td><a href="edit.html">{{ $objItem->id_chitiet }}</a></td>
                                            <td>{{ $objItem->username }}</td>
                                        	<td>{{ $objItem->ngaydat }}</td>
                                            <td>{{ $objItem->treem }}</td>
                                            <td>{{ $objItem->trenho }}</td>
                                            <td>{{ $objItem->nguoilon }}</td>
                                        	<td>{{ $objItem->soluongdat }}</td>
                                            <td class="change-{{$objItem->id_pd}}">
                                                @if($objItem->trangthai==0)
                                                <a onclick="return setActivexd({{ $objItem->id_pd }})" href="javascript:void(0)"><img src="{{ $urlAdmin }}/img/disactive.png"/></a>
                                                @else
                                                <a onclick="return setActivexd({{ $objItem->id_pd }})" href="javascript:void(0)"><img src="{{ $urlAdmin }}/img/active.png"/></a>
                                                @endif
                                                <br/>
                                            </td>
                                            <td class="huy-{{$objItem->id_pd}}">
                                                @if($objItem->huy==0)
                                                <a onclick="return setActivehuy({{ $objItem->id_pd }})" href="javascript:void(0)"><img src="{{ $urlAdmin }}/img/disactive.png"/></a>
                                                @else
                                                <a onclick="return setActivehuy({{ $objItem->id_pd }})" href="javascript:void(0)"><img src="{{ $urlAdmin }}/img/active.png"/></a>
                                                @endif
                                                <br/>
                                            </td>
                                            <td>{{ $objItem->ghichu }}</td>
                                        	<td>
                                        		<a href="{{ route('admin.phieudat.del',['id' => $objItem->id_pd]) }}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /> Xóa</a>
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
@section('js')
    <script type="text/javascript">    
        function setActivexd(id){
        //alert(id);
        $.ajax({
            url: "{{ route('ajax.ajax.duyetpd') }}",
            type: 'get',
            cache: false,
            data: {aid: id},
            success: function(data){
                $('.change-'+id).html(data); //load dữ liệu về
            },
            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
        }
        function setActivehuy(id){
        //alert(id);
        $.ajax({
            url: "{{ route('ajax.ajax.huypd') }}",
            type: 'get',
            cache: false,
            data: {aid: id},
            success: function(data){
                $('.huy-'+id).html(data); //load dữ liệu về
            },
            error: function (){
                alert('Có lỗi xảy ra');
            }
        });
        return false;
        }
    </script>
@stop