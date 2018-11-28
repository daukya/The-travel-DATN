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
                                <h4 class="title">Thêm tour chi tiết</h4>
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
                                <form action="{{ route('admin.chitiettour.add') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Chọn tour</label>
                                                <select name="tour" class="form-control border-input">
                                                        <option value="">-- chọn tour --</option>
                                                    @foreach($objItemsT as $key => $objItem)
                                                        <option value="{{ $objItem->id_tour }}">{{ $objItem->tentour }} - Tối đa {{ $objItem->sltd }} - {{ $objItem->tenlt }} - {{ $objItem->songay }} ngày - {{ $objItem->sodem }} đêm</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày đi</label>
                                                <input type="datetime-local" name="ngaydi" class="form-control border-input" placeholder="Nhập ngày đi" value="" min="">
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày về</label>
                                                <input type="datetime-local" name="ngayve" class="form-control border-input" placeholder="Nhập ngày về" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>ghi chú</label>
                                                <input type="text" name="ghichu" class="form-control border-input" placeholder="Nhập ghi chú" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh</label>
                                                <input type="file" name="hinhanh" class="form-control border-input" placeholder="Nhập hình ảnh" value="">
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