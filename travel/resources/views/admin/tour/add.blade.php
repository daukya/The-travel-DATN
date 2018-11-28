@extends('templates.admin.master')
@section('css')
<style type="text/css">
    .mau li{
      color: blue;
    }
</style>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        //lấy id chỗ click gọi hàm
        $("#idtinh").click(function(){
            //khai báo biến và lấy giá trị của nó
            var id= $(this).val();
            //alert(id);
            //thoát ra khỏi admin. get đặt tên idtl giá trị là id truyền đến loaitin.php
        $.get("http://travel.com:8082/xldd",{aid:id},function(data){
                $("#dd").html(data);
            });
        });
    });
</script>
@stop
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul class="mau">
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                            @endif  
                            <div class="header">
                                <h4 class="title">Thêm Tour</h4>
                            </div>
                            <div class="content">
                                <form action="{{ route('admin.tour.add') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phương tiện</label>
                                                <input type="text" name="pt" class="form-control border-input" placeholder="Nhập phương tiện" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Số lượng tối đa</label>
                                                <input type="text" name="sltd" class="form-control border-input" placeholder="Nhập số lượng tối đa" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên tour</label>
                                                <input type="text" name="tentour" class="form-control border-input" placeholder="Nhập tên tour" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Lịch trình</label>
                                                <textarea name="lichtrinh" class="form-control border-input" placeholder="Nhập tên tour" value=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Số ngày</label>
                                                <input type="text" name="songay" class="form-control border-input" placeholder="Nhập số ngày" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Số đêm</label>
                                                <input type="text" name="sodem" class="form-control border-input" placeholder="Nhập số đêm" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Bản đồ</label>
                                                <input type="text" name="bando" class="form-control border-input" placeholder="Nhập bản đồ" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá người lớn</label>
                                                <input type="text" name="gialon" class="form-control border-input" placeholder="Nhập giá người lớn" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá trẻ em</label>
                                                <input type="text" name="giaem" class="form-control border-input" placeholder="Nhập giá trê em" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá trẻ nhỏ</label>
                                                <input type="text" name="gianho" class="form-control border-input" placeholder="nhập giá trẻ nhỏ" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả tour</label>
                                                <textarea name="ghichu" class="form-control border-input" placeholder="nhập mô tả" id="my-editor" value=""></textarea>
                                                <!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->
                                                <script type="text/javascript">
                                                    CKEDITOR.replace( 'my-editor', {
                                                        filebrowserBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html') }}',
                                                        filebrowserImageBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Images') }}',
                                                        filebrowserFlashBrowseUrl: '{{ asset('public/ckfinder/ckfinder.html?type=Flash') }}',
                                                        filebrowserUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                                        filebrowserImageUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                                        filebrowserFlashUploadUrl: '{{ asset('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                                    } );
                                                </script>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn tỉnh</label>
                                                <select id="idtinh" name="tinh" class="form-control border-input">
                                                <option value="0">--- chọn tỉnh ---</option>   
                                                @foreach($objItemsT as $key => $objItem)
                                                    <option value="{{ $objItem->id_tinh }}">{{ $objItem->tentinh }}</option>
                                                @endforeach    
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn điểm khởi hành</label>
                                                <select id="dd" name="diadiem" class="form-control border-input">
                                                      
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn loại tour</label>
                                                <select name="loaitour" class="form-control border-input">
                                                        <option value="0">-- chọn loại tour --</option>
                                                    @foreach($objItemsLT as $key => $objItem)
                                                        <option value="{{ $objItem->id_lt }}">{{ $objItem->tenlt }}</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div>
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop