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
                            <div class="header">
                                <h4 class="title">Thêm Tour</h4>
                            </div>
                            @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul class="mau">
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                            @endif 
                            <div class="content">
                                <form action="{{ route('admin.tour.edit',['id' => $objItem->id_tour]) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phương tiện</label>
                                                <input type="text" name="pt" class="form-control border-input" placeholder="Nhập phương tiện" value="{{ $objItem->phuongtien }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Số lượng tối đa</label>
                                                <input type="text" name="sltd" class="form-control border-input" placeholder="Nhập số lượng tối đa" value="{{ $objItem->sltd }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên tour</label>
                                                <input type="text" name="tentour" class="form-control border-input" placeholder="Nhập tên tour" value="{{ $objItem->tentour }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Lịch trình</label>
                                                <textarea name="lichtrinh" class="form-control border-input" placeholder="Nhập tên tour" value="">{{ $objItem->lichtrinh }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Số ngày</label>
                                                <input type="text" name="songay" class="form-control border-input" placeholder="Nhập số ngày" value="{{ $objItem->songay }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Bản đồ</label>
                                                <input type="text" name="bando" class="form-control border-input" placeholder="Nhập bản đồ" value="{{ $objItem->bando }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Số đêm</label>
                                                <input type="text" name="sodem" class="form-control border-input" placeholder="Nhập số đêm" value="{{ $objItem->sodem }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá người lớn</label>
                                                <input type="text" name="gialon" class="form-control border-input" placeholder="Nhập giá người lớn" value="{{ $objItem->gianguoilon }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá trẻ em</label>
                                                <input type="text" name="giaem" class="form-control border-input" placeholder="Nhập giá trê em" value="{{ $objItem->giatreem }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Giá trẻ nhỏ</label>
                                                <input type="text" name="gianho" class="form-control border-input" placeholder="nhập giá trẻ nhỏ" value="{{ $objItem->giatrenho }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả tour</label>
                                                <textarea id="my-editor" name="ghichu" class="form-control border-input" placeholder="nhập mô tả" value="">{{ $objItem->motatour }}</textarea>
                                                <!-- <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                                <script>

                                                    CKEDITOR.replace( 'summary-ckeditor' );
                                                </script> -->
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
                                                    <option value="0">-- Chọn tỉnh --</option>
                                                @foreach($objItemsT as $key => $val)
                                                    @php
                                                        $selected='';
                                                    @endphp
                                                    @if($objItem->id_tinh == $val->id_tinh)
                                                        @php
                                                            $selected='selected';
                                                        @endphp
                                                    @endif
                                                    <option {{ $selected }} value="{{ $val->id_tinh }}">{{ $val->tentinh }}</option>
                                                @endforeach    
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn điểm khởi hành</label>
                                                <select id="dd" name="diadiem" class="form-control border-input">
                                                    <option value="{{ $objItem->id_dd }}">{{ $tendd }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn loại tour</label>
                                                <select name="loaitour" class="form-control border-input">
                                                        <option value="0">-- chọn loại tour --</option>
                                                    @foreach($objItemsLT as $key => $val)
                                                        @php
                                                            $selected='';
                                                        @endphp
                                                        @if($val->id_lt == $objItem->id_lt)
                                                            @php
                                                                $selected='selected';
                                                            @endphp
                                                        @endif
                                                        <option {{ $selected }} value="{{ $val->id_lt }}">{{ $val->tenlt }}</option>
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