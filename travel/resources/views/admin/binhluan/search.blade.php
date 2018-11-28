@extends('templates.admin.master')
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách bình luận</h4>
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.binhluan.search') }}" method="get">
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
                                <form action="{{ route('admin.binhluan.delmore') }}" method="post">
                                    {{ csrf_field() }}
                                <table class="table table-striped" border="1">
                                    <thead>
                                        <th><input type="checkbox" id="checkAll" onchange="return check_all()" />
                                        <input type="submit" name="sub" value="xóa" /></th>
                                        <th>ID_BL</th>
                                    	<th>ID_CT</th>
                                    	<th>Tên</th>
                                    	<th>Nội dung</th>
                                        <th>Trạng thái</th>
                                    	<th>Chức năng</th>
                                    </thead>
                                    <tbody>
                                        @foreach($objItems as $key => $objItem)
                                        <tr>
                                            <td>
                                              <input type="checkbox" class="checkcm" name="cmdel[]" value="{{ $objItem->id_bl }}" onchange="return check_one()" >
                                            </td>
                                        	<td>{{ $objItem->id_bl }}</td>
                                        	<td><a href="edit.html">{{ $objItem->id_chitiet }}</a></td>
                                        	<td>{{ $objItem->ten }}</td>
                                        	<td>{{ $objItem->noidung }}</td>
                                            @if($objItem->trangthai==0)
                                                <td class="change-{{ $objItem->id_bl }}"><a onclick="return setActive({{ $objItem->id_bl }})" href="javascript:void(0)"><img src="{{ $urlAdmin }}/img/disactive.png"/></a></td>
                                            @else
                                                <td class="change-{{ $objItem->id_bl }}"><a onclick="return setActive({{ $objItem->id_bl }})" href="javascript:void(0)"><img src="{{ $urlAdmin }}/img/active.png"/></a></td>
                                            @endif
                                        	<td>
                                        		<a href="{{ route('admin.binhluan.del',['id' => $objItem->id_bl]) }}"><img src="{{ $urlAdmin }}/img/del.gif" alt="" /> Xóa</a>
                                        	</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
 
                                </table>
                            </form>

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
        function setActive(id){
        $.ajax({
            url: "{{ route('ajax.ajax.xlbl') }}",
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
    </script>
    <script type="text/javascript">
              function check_all(){
                $(".checkcm").prop('checked', $("#checkAll").prop("checked"));
              };
              function check_one(){
                var $_checkedall = true;
                  $('.checkcm').each(function(){
                      if(!$(this).is(':checked')){
                          $_checkedall = false;
                      }
                      $('#checkAll').prop('checked', $_checkedall);
                  });
              };
    </script>
@stop