@extends('templates.travel.master') 
@section('css')
<style type="text/css" media="screen">
    /* hình ảnh top tour */
    .v_place_img{
        width: 350px;
        height: 222px;
    }
    .col-md-6{
        width: 570px;
        height: 489px;
    }
    .col-md-3{
        width: 270px;
        height: 214px;
    }
    .ho-hot-pri{
        font-size: 24px;
    }
    .to-ho-hotel-con-1 {
    width: 349px;
    height: 300px;
    }
    .tour-mig-lc-con h6 {
        font-size: 18px;
        top: -25px;
        border: 0px;
        padding-left: 0px;
        padding-right: 30px;
        margin-right: : 21px;
    }
    select {
        display: block;
        height: 0px;
    }
    .a{
            width: 10px;
            height: 10px;
    }
</style>

@stop
@section('content')
    <section>
        <div class="tourz-search">
            <div class="container">
                <div class="row">
                    <div class="tourz-search-1">
                        <h1>Lên kế hoạch ngay!</h1>
                        <p>Du lịch tận hưởng, trải nghiệm du lịch thú vị và giá rẻ chưa từng thấy. Luôn luôn lắng nghe luôn luôn thấu hiểu</p>
                        <form action ="{{ route('travel.index.timkiem') }}" method="get" class="tourz-search-form">
                            <div class="a">
                                <!-- <select name="gia" multiple>
                                    <option value="">a</option>
                                    <option value="">b</option>
                                </select> -->
                            </div>
                            <div class="input-field">
                                <input type="text" name ="tk" placeholder="tìm kiếm ngày khởi hành, địa điểm, giá, tên tour" id="select-search" class="autocomplete">
                            </div>
                            <div class="input-field">
                                <input type="submit" value="Tìm kiếm" class="waves-effect waves-light tourz-sear-btn"> </div>
                        </form>
                        <div class="tourz-hom-ser">
                            <ul>
                                <li>
                                    <a href="#" class="waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="0.5s"><img src="{{ $urlPublic }}/images/icon/2.png" alt=""> Tour</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="1s"><img src="{{ $urlPublic }}/images/icon/31.png" alt=""> Flight</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="1.5s"><img src="{{ $urlPublic }}/images/icon/30.png" alt=""> Car Rentals</a>
                                </li>
                                <li>
                                    <a href="#" class="waves-effect waves-light btn-large tourz-pop-ser-btn wow fadeInUp" data-wow-duration="2s"><img src="{{ $urlPublic }}/images/icon/1.png" alt=""> Hotel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->

    <section>
        <div class="rows pad-bot-redu tb-space">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Top <span>Tour hàng đầu</span></h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Trang web du lịch được yêu thích, lựa chọn hàng đầu của người việt.</p>
                </div>
                <div>
                    <!-- TOUR PLACE 1 -->
                    @foreach($objItemsHD as $key => $val)
                        @php
                        $slug = str_slug($val->tentour);
                        @endphp
                        
                    <div class="col-md-4 col-sm-6 col-xs-12 b_packages wow slideInUp" data-wow-duration="0.5s">
                        <!-- OFFER BRAND -->
                        <div class="band"> <img src="{{ $urlPublic }}/images/band.png" alt="" /> </div>
                        <!-- IMAGE -->
                        <div class="v_place_img"> <img src="storage/app/files/{{ $val->hinhanh }}" alt="Tour Booking" title="Tour Booking" /> </div>
                        <!-- TOUR TITLE & ICONS -->
                        <div class="b_pack rows">
                            <!-- TOUR TITLE -->
                            <div class="col-md-8 col-sm-8">
                                <h4><a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}">{{ $val->tentour }}<span class="v_pl_name">({{ $val->diemden }})</span></a></h4>
                            </div>
                            <!-- TOUR ICONS -->
                            <div class="col-md-4 col-sm-4 pack_icon">
                                <ul>
                                    <li>
                                        <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}"><img src="{{ $urlPublic }}/images/clock.png" alt="Date" title="Tour Timing" /> </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}"><img src="{{ $urlPublic }}/images/info.png" alt="Details" title="View more details" /> </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}"><img src="{{ $urlPublic }}/images/price.png" alt="Price" title="Price" /> </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}"><img src="{{ $urlPublic }}/images/map.png" alt="Location" title="Location" /> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>
            </div>
        </div>
    <section>
        <div class="rows tb-space pad-top-o pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Tour <span>nổi bật</span> </h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Hơn 1000 tour nổi bật, đang chờ bạn khám phá.</p>
                </div>
                <!-- CITY -->
                @foreach($objItem1NB as $key => $val)
                        @php
                        $slug = str_slug($val->tentour);
                        @endphp
                <div class="col-md-6">
                    <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"><img height="420px" src="storage/app/files/{{ $val->hinhanh }}" alt=""></div>
                            <div class="tour-mig-lc-con">
                                <h6>{{ $val->tentour }}</h6>
                                <br/>
                                <p><span>Khởi hành tại: {{ $val->diemden }} ({{ $val->ngaydi }}) </span>Giá {{ $val->gianguoilon }} VNĐ  - còn {{ $val->soluongcon }} chỗ</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @foreach($objItemsNB as $key => $val)
                        @php
                        $slug = str_slug($val->tentour);
                        @endphp
                <div class="col-md-3">
                    <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}">
                        <div class="tour-mig-like-com">
                            <div class="tour-mig-lc-img"> <img width="270px" height="200px" src="storage/app/files/{{ $val->hinhanh }}" alt=""> </div>
                            <div class="tour-mig-lc-con tour-mig-lc-con2">
                                <h5>{{ $val->tentour }}</h5>
                                <p>Giá {{ $val->gianguoilon }} VNĐ ({{ $val->soluongcon }})</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== SECTION: FREE CONSULTANT ==========-->
    <section>
        <div class="offer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Tour Chất, siêu rẻ</span>                            <span class="ol-3"></span> <span class="ol-5">1tr500 VNĐ+ </span>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration="0.5s">
                                    <a href="index.htm#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ $urlPublic }}/images/icon/dis1.png" alt="">
    								</a><span>Free WiFi</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.7s">
                                    <a href="index.htm#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ $urlPublic }}/images/icon/dis2.png" alt=""> </a><span>Breakfast</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="0.9s">
                                    <a href="index.htm#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ $urlPublic }}/images/icon/dis3.png" alt=""> </a><span>Pool</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.1s">
                                    <a href="index.htm#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ $urlPublic }}/images/icon/dis4.png" alt=""> </a><span>Television</span>
                                </li>
                                <li class="wow fadeInUp" data-wow-duration="1.3s">
                                    <a href="index.htm#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ $urlPublic }}/images/icon/dis5.png" alt=""> </a><span>GYM</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="offer-r">
                            <div class="or-1"> <span class="or-11">Đặt</span> <span class="or-12">ngay</span> </div>
                            <div class="or-2"> <span class="or-21">Giảm</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== EVENTS ==========-->
    <section>
        <div class="rows tb-space">
            <div class="container events events-1" id="inner-page-title">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Tour <span>sự kiện</span> Sắp diễn ra</h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Trang web du lịch hàng đầu trong nước. Đặt các gói du lịch và tận hưởng kỳ nghỉ của bạn với trải nghiệm đặc biệt.</p>
                </div>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Event Name.." title="Type in a name">
                <table id="myTable">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Hình ảnh</th>
                            <th class="e_h1">Tên tour</th>
                            <th class="e_h1">Khởi hành</th>
                            <th class="e_h1">SL còn</th>
                            <th class="e_h1">Ngày đi</th>
                            <th class="e_h1">Thời gian</th>
                            <th class="e_h1">giá</th>
                            <th>Đặt</th>
                        </tr>
                        @foreach($objItemsSK as $key => $val)
                            @php
                            $slug = str_slug($val->tentour);
                            @endphp
                        <tr>
                            <td>{{ $val->id_chitiet }}</td>
                            <td><img width="100px" height="100px" src="/storage/app/files/{{ $val->hinhanh }}" alt="" /></td>
                            <td><a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}">{{ $val->tentour }}</a></td>
                            <td class="e_h1">{{ $val->diemden }}</td>
                            <td class="e_h1">{{ $val->soluongcon }}</td>
                            <td class="e_h1">{{ $val->ngaydi }}</td>
                            <td class="e_h1">
                                {{ $val->songay }} Ngày /
                                {{ $val->sodem }} Đêm 
                            </td>
                            <td class="e_h1">{{ $val->gianguoilon }}</td>
                            @if($val->soluongcon>0)
                            <td><a href="{{ route('travel.tour.phieudat',['id' => $val->id_chitiet,'slug'=>$slug]) }}" class="link-btn">Đặt ngay</a></td>
                            @else
                            <td><a href="javascript:void(0)" class="link-btn">Hết chỗ</a> </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--====== POPULAR TOUR PLACES ==========-->
    <section>
        <div class="rows tb-space pad-top-o pad-bot-redu">
            <div class="container">
                <!-- TITLE & DESCRIPTION -->
                <div class="spe-title">
                    <h2>Tour<span> Yêu thích gần đây</span> </h2>
                    <div class="title-line">
                        <div class="tl-1"></div>
                        <div class="tl-2"></div>
                        <div class="tl-3"></div>
                    </div>
                    <p>Niềm vui của khách hàng là niềm tự hào của chúng tôi.</p>
                </div>
                <!-- HOTEL GRID -->
                <div class="to-ho-hotel">
                    @foreach($objItemsYT as $key => $val)
                            @php
                            $slug = str_slug($val->tentour);
                            @endphp
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hot-page2-hli-3"> <img src="{{ $urlPublic }}/images/hci1.png" alt=""> </div>
                                <div class="hom-hot-av-tic">Số lượng còn: {{ $val->soluongcon }}</div><img width="300px" height="300px" src="/storage/app/files/{{ $val->hinhanh }}" alt=""></div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2">
                                    <a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}">
                                        <h4>{{ $val->tentour }}</h4>
                                    </a>
                                </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>Điểm khởi hành: {{ $val->diemden }}
                                            <br/>Thời gian: {{ $val->songay }} Ngày, {{ $val->sodem }} đêm 
                                            <div class="dir-rat-star ho-hot-rat-star">Ngày khởi hành: {{ $val->ngaydi }}</div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$720</span><span class="ho-hot-pri">Giá: {{ $val->gianguoilon }} VNĐ</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop