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
                                <h4 class="title">Thêm chức vụ</h4>
                            </div>
                            <div class="content">
                                <form action="{{ route('admin.loaitour.edit',['id' => $objItem->id_lt]) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên loại tour</label>
                                                <input type="text" name="tenlt" class="form-control border-input" placeholder="Nhập vào tên loại tour" value="{{ $objItem->tenlt }}">
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