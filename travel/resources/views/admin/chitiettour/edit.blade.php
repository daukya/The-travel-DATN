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
                                <h4 class="title">Sửa tour chi tiết</h4>
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
                                <form action="{{ route('admin.chitiettour.edit',['id' => $objItem->id_chitiet]) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chọn tour</label>
                                                <select name="tour" class="form-control border-input">
                                                        <option value="">-- chọn tour --</option>
                                                    @foreach($objItemsT as $key => $val)
                                                        @php
                                                        $selected='';
                                                        @endphp
                                                        @if($val->id_tour == $objItem->id_tour)
                                                            @php
                                                                $selected='selected';
                                                            @endphp
                                                        @endif
                                                        <option {{ $selected }} value="{{ $val->id_tour }}">{{ $val->tentour }} - Tối đa {{ $val->sltd }}</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày đi</label>
                                                <input type="datetime" name="ngaydi" class="form-control border-input" placeholder="Nhập ngày đi" value="{{ $objItem->ngaydi }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày về</label>
                                                <input type="datetime" name="ngayve" class="form-control border-input" placeholder="Nhập ngày về" value="{{ $objItem->ngayve }}">
                                            </div>
                                            <div class="form-group">
                                                <label>ghi chú</label>
                                                <input type="text" name="ghichu" class="form-control border-input" placeholder="Nhập ghi chú" value="{{ $objItem->ghichu }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="hinhanh" class="form-control border-input" placeholder="Nhập hình ảnh" value="">
                                                <br/>
                                                Ảnh cũ: <img width="120px" src="/storage/app/files/{{ $objItem->hinhanh }}" alt="" />
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