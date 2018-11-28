@extends('templates.travel.master') 
@section('css')
    <style type="text/css" media="screen">
        .center{
            vertical-align: center;
        }
    </style>
@stop
@section('content')
		<!-- TOP SEARCH BOX -->
        <div class="search-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-form">
						<form action ="{{ route('travel.index.timkiem') }}" method="get" class="tourz-search-form">
                            <div class="input-field">
                                
                            </div>
                            <div class="input-field">
                                <input type="text" name ="tk" placeholder="tìm kiếm ngày khởi hành, địa điểm, giá, tên tour" id="select-search" class="autocomplete">
                            </div>
                            <div class="input-field">
                                <input type="submit" value="Tìm kiếm" class="waves-effect waves-light tourz-sear-btn"> </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- END TOP SEARCH BOX -->
    </section>
    <!--END HEADER SECTION-->
	
    <!--====== BANNER ==========-->
    <section>
        <div class="rows inner_banner inner_banner_5">
            <div class="container">
                <h2><span>Top những tour</span> mới nhất và phổ biến nhất được tìm thấy</h2><ul><li><a href="{{ route('travel.index.index') }}">Trang chủ</a></li><li><i class="fa fa-angle-right" aria-hidden="true"></i> </li><li><a href="#" class="bread-acti">{{ $objItem->tenlt }}</a></li></ul>
                <p>Đặt vé du lịch và tận hưởng kỳ nghỉ của bạn với trải nghiệm đặc biệt</p>
            </div>
        </div>
    </section>
    <!--====== PLACES ==========-->
    <section>
        <div class="rows inn-page-bg com-colo">
            <div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title col-md-12">
                    <h2>Loại tour<span> {{ $objItem->tenlt }}</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Trang web du lịch ưu chuộng hàng đầu, trang web đặt vé, Hơn 30.000 tour trên cả nước. Đặt các gói du lịch và tận hưởng kỳ nghỉ của bạn với trải nghiệm đặc biệt</p>
                </div>

                <!--===== PLACES ======-->
                @foreach($objItems as $key => $val)
                        @php
                        $slug = str_slug($val->tentour);
                        @endphp
                <div class="rows p2_2">
                    <div class="col-md-6 col-sm-6 col-xs-12 p2_1">
                        <img width="100px" height="400px" src="/storage/app/files/{{ $val->hinhanh }}" alt="" />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 p2">
                        <h3>{{ $val->tentour }} {{ $val->songay }} ngày/ {{ $val->sodem }} đêm <span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span></h3>
                        <p>{{ $val->ghichu }}</p>
                        <div class="ticket">
                            <ul>
                                <li>Số lượng còn : {{ $val->soluongcon }}</li>
                                <li>Ngày khởi hành : {{ $val->ngaydi }}</li>
                                <li>Ngày kết thúc: {{ $val->ngayve }}</li>
                            </ul>
                        </div>
                        <div class="featur">
                            <h4>Phương tiện: {{ $val->phuongtien }}</h4>
                            <ul>
                                <li>Giá người lớn: {{ $val->gianguoilon }}</li>
                                <li>Giá trẻ em (<12) : {{ $val->giatreem }}</li>
                                <li>Giá trẻ nhỏ (<2): {{ $val->giatrenho }}</li>
                                <li>Điểm khởi hành: {{ $val->diemden }} ({{ $val->tentinh }})</li>
                            </ul>
                        </div>
                        <div class="p2_book">
                            <ul>
                                @if($val->soluongcon>0)
                                    <li><a href="{{ route('travel.tour.phieudat',['id' => $val->id_chitiet,'slug'=>$slug]) }}" class="link-btn">Đặt ngay</a>
                                    </li>
                                @endif
                                <li><a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}" class="link-btn">Chi tiết</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="center">{{ $objItems->links() }}</div>
            </div>
        </div>
    </section>
@stop