@extends('templates.admin.master')
@section('css')
<style type="text/css">
    .mau li{
      color: blue;
    }
</style>
@stop
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Thêm chương trình tour</h4>
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
                                <p class="category success">{{ session('msg') }}</p>
                                <form action="{{ route('admin.chuongtrinhtour.add') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chọn tour</label>
                                                <select name="tour" class="form-control border-input">
                                                        <option value="">-- chọn tour --</option>
                                                    @foreach($objItems as $key => $objItem)
                                                        <option value="{{ $objItem->id_tour }}">{{ $objItem->tentour }} - {{ $objItem->tenlt }} - {{ $objItem->songay }} ngày - {{ $objItem->sodem }} đêm</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" name="tieude" class="form-control border-input" placeholder="Nhập mô tả" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày thứ</label>
                                                  <select name="ngaythu">
                                                  <option value="">--- Chọn ngày thứ ---</option>
                                                   @php
                                                      $i=1;
                                                   @endphp
                                                    @for($i==1;$i<=20;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                  </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea name="mota" class="form-control border-input" placeholder="nhập mô tả" id="my-editor" value=""></textarea>
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
                                        </div>

                                    </div>
                                    
                                    <div>
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thêm" />
                                    </div>
                                    </form>
                                    <br/>
                                    <form action ="{{ route('admin.chuongtrinhtour.index') }}">
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thêm xong" />
                                    </form>
                                    <div class="clearfix"></div>
                                
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
@stop