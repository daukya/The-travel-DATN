@extends('templates.admin.master')
<style type="text/css">
    .mau li{
      color: blue;
    }
</style>
@section('content')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Sửa địa điểm</h4>
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
                                <form action="{{ route('admin.diadiem.edit',['id' => $objItemx->id_dd]) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chọn tỉnh</label>
                                                <select name="tinh" class="form-control border-input">
                                                        <option value="0">-- chọn tỉnh --</option>
                                                    @foreach($objItemsT as $key => $val)
                                                        @php
                                                            $selected='';
                                                        @endphp
                                                        @if($val->id_tinh == $objItemx->id_tinh)
                                                            @php
                                                                $selected='selected';
                                                            @endphp
                                                        @endif
                                                        <option {{ $selected }} value="{{ $val->id_tinh }}">{{ $val->tentinh }}</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên địa điểm</label>
                                                <input type="text" name="diemden" class="form-control border-input" placeholder="Nhập địa điểm" value="{{ $objItemx->diemden }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả</label>
                                                <input type="text" name="mota" class="form-control border-input" placeholder="Nhập mô tả" value="{{ $objItemx->mota }}">
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