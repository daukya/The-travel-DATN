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
                                <h4 class="title">Sửa chương trình tour</h4>
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
                                <form action="{{ route('admin.chuongtrinhtour.edit',['id' => $objItemCT->id_chuongtrinh]) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chọn tour</label>
                                                <select name="tour" class="form-control border-input">
                                                        <option value="">-- chọn tour --</option>
                                                    @foreach($objItems as $key => $val)
                                                        @php
                                                            $selected='';
                                                        @endphp
                                                        @if($val->id_tour == $objItemCT->id_tour)
                                                            @php
                                                                $selected='selected';
                                                            @endphp
                                                        @endif
                                                        <option {{ $selected }} value="{{ $val->id_tour }}">{{ $val->tentour }}</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input type="text" name="tieude" class="form-control border-input" placeholder="Nhập mô tả" value="{{ $objItemCT->tieude }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày thứ</label>
                                                  <select name="ngaythu">
                                                  <option value="">--- Chọn ngày thứ ---</option>
                                                   @php
                                                      $i=1;
                                                   @endphp
                                                    @for($i==1;$i<=20;$i++)
                                                    @php
                                                            $selected='';
                                                        @endphp
                                                        @if($i == $objItemCT->ngaythu)
                                                            @php
                                                                $selected='selected';
                                                            @endphp
                                                        @endif
                                                    <option {{ $selected }} value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                  </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <textarea name="mota" class="form-control border-input" placeholder="nhập mô tả" id="my-editor" value="">{{ $objItemCT->mota }}</textarea>
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