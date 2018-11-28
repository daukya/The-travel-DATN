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
                                <h4 class="title">Thêm user</h4>
                            </div>
                            <div class="content">
                                <form action="{{ route('admin.users.add') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input type="text" name="ten" class="form-control border-input" placeholder="Nhập họ tên" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>CMND</label>
                                                <input type="text" name="cmnd" class="form-control border-input" placeholder="Nhập chứng minh nhân dân" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control border-input" placeholder="Nhập địa chỉ" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>SDT</label>
                                                <input type="text" name="sdt" class="form-control border-input" placeholder="Nhập số điện thoại" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control border-input" placeholder="Nhập email" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Ghichu</label>
                                                <input type="text" name="ghichu" class="form-control border-input" placeholder="Nhập ghi chú" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Nhập tên user" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>mật khẩu</label>
                                                <input type="password" name="pass" class="form-control border-input" placeholder="Nhập mật khẩu" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Nhập lại mật khẩu</label>
                                                <input type="password" name="repass" class="form-control border-input" placeholder="nhập lại mật khẩu" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn chức vụ</label>
                                                <select name="chucvu" class="form-control border-input">
                                                    <option value="0">-- Chọn chức vụ --</option>
                                                @foreach($objItems as $key => $objItem)
                                                    <option value="{{ $objItem->id_cv }}">{{ $objItem->tencv }}</option>
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