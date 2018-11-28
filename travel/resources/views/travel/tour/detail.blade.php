@extends('templates.travel.master') 
@section('css')
	<style type="text/css" media="screen">
			.tout-map {
				margin-top: 30px;
			}
	</style>
@stop
@section('content')
<!-- nút like fb -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>	
<!-- -- -->
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
                                <input type="text" name ="tk" placeholder="tìm kiếm ngày khởi hành, địa điểm, giá, tên tour" id="select-search" class="autocomplete" value="">
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
	@foreach($objItemPL as $key => $objItem)	
		 	@php
	        $slug = str_slug($objItem->tentour);
	        @endphp
	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_4">
			<div class="container">
				<h2><span>Còn {{ $objItem->soluongcon }} chỗ -</span> {{ $objItem->tentour }}</h2>
				<ul>
					<li><a href="{{ route('travel.index.index') }}">Trang chủ</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
					<li><a href="index.htm#inner-page-title" class="bread-acti">{{ $objItem->tenlt }}</a>
					</li>
				</ul>
				<p>Hãy đặt ngay nhiều ưu đãi đang chờ bạn khám phá! </p>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS - BOOKING ==========-->
	<section>
		<div class="rows banner_book" id="inner-page-title">
			<div class="container">
				<div class="banner_book_1">
					<ul>
						<li class="dl1">Khởi hành tại : {{ $objItem->diemden }}</li>
						<li class="dl2">Giá : {{ $objItem->gianguoilon }}</li>
						<li class="dl3">Thời gian : {{ $objItem->songay }} Ngày / {{ $objItem->sodem }} Đêm</li>
						@if($objItem->soluongcon>0)
						<li class="dl4"><a href="{{ route('travel.tour.phieudat',['id' => $objItem->id_chitiet,'slug'=>$slug]) }}">Đặt ngay</a> </li>
						@else
						<li class="dl4"><a href="javascript:void(0)">Hết chỗ</a> </li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== TOUR DETAILS ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space">
				<div class="col-md-9">
					<!--====== TOUR TITLE ==========-->
					<div class="tour_head">
						<h2>{{ $objItem->tentour }} <span class="tour_star"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></span><span class="tour_rat">4.5</span></h2> </div>
					<!--====== TOUR DESCRIPTION ==========-->
					<div class="tour_head1">
						<h3>Giới thiệu tour</h3>

						<p>{!! $objItem->motatour !!}</p>
						<p>{{ $objItem->ghichu }}</p>
					</div>
					
					<!--====== TOUR LOCATION ==========-->
					<div class="tour_head1 tout-map map-container">
						<h3>Bản đồ</h3>
						<iframe src="{{ $objItem->bando }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					
					<!--====== DURATION ==========-->
					<div class="tour_head1 l-info-pack-days days">
						<h3>Chương trình tour</h3>
						<ul>
							@foreach($objItemCT as $key => $val)	
							<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
								<h4><span>Ngày : {{ $val->ngaythu }}</span> {{ $val->tieude }}</h4>
								<p>{!! $val->mota !!}</p>
							</li>
							@endforeach
						</ul>
					</div>
					<div>
						<div class="dir-rat">
							<div class="dir-rat-inn dir-rat-title">
								<h3>Để lại bình luận!</h3>
								<p>Nếu bạn có thắc mắc gì về tour hãy để lại bình luận</p>
								<!-- nút like fb -->
								<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="10px" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
							</div>
							<div class="dir-rat-inn">
								<form action="{{ route('travel.tour.binhluan',['id' => $objItem->id_chitiet]) }}" class="dir-rat-form" method="post">
									{{ csrf_field() }}
									<div class="form-group col-md-12 pad-left-o">
										<textarea placeholder="Nhập bình luận" name="noidung"></textarea>
									</div>
									<div class="form-group col-md-12 pad-left-o">
										<input type="submit" value="Gửi bình luận" class="link-btn"></div>
								</form>
								
							</div>
							<!--COMMENT RATING-->
							@foreach($objItemsBL as $key => $val)

							<div class="dir-rat-inn dir-rat-review">
								<div class="row">
									<div class="col-md-3 dir-rat-left"> <img src="{{ $urlPublic }}/images/reviewer/4.jpeg" alt="">
										<p>{{ $val->ten }}<span>{{ $val->ngaygio }}</span> </p>
									</div>
									<div class="col-md-9 dir-rat-right">
										<div class="dir-rat-star"> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<p>{{ $val->noidung }}</p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-3 tour_r">
					<!--====== hiển thị 1 tour nổi bật ==========-->
					@foreach($obj1ItemNB as $key=>$val)
					<div class="tour_right tour_offer">
						<div class="band1"><img src="{{ $urlPublic }}/images/offer.png" alt="" /> </div>
						<p>Đặc biệt</p>
						<h4>{{ $val->gianguoilon }}</h4>
						@if($val->soluongcon>0)
						<a href="{{ route('travel.tour.phieudat',['id' => $val->id_chitiet,'slug'=>$slug]) }}" class="link-btn">Đặt chỗ</a> </div>
						@else
						<a href="javascript:void(0)" class="link-btn">Hết chỗ</a> </div>
						@endif
						
					@endforeach
					<!--====== TRIP INFORMATION ==========-->
					<div class="tour_right tour_incl tour-ri-com">
						<h3>Thông tin tour</h3>
						<ul>
							<li>Lịch trình : {{ $objItem->lichtrinh }} </li>
							<li>Ngày đi: {{ $objItem->ngaydi }}</li>
							<li>Ngày về: {{ $objItem->ngayve }}</li>
							<li>Phương tiện: {{ $objItem->phuongtien }}</li>
							<li><a href="{{ route('travel.giohang.add',['slug'=>$slug,'id'=>$objItem->id_chitiet]) }}"><img width="50px" heigh="20px" src="{{ $urlPublic }}/images/cart_icon.png" alt=""/></a></li>
						</ul>
					</div>
					@endforeach
					<!--====== PACKAGE SHARE ==========-->
					<div class="tour_right head_right tour_social tour-ri-com">
						<h3>Theo dõi chúng tôi</h3>
						<ul>
							<li><a href="index.htm#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
							<li><a href="index.htm#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
							<li><a href="index.htm#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li><a href="index.htm#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
							<li><a href="index.htm#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
						</ul>
					</div>
					<!--====== HELP PACKAGE ==========-->
					<div class="tour_right head_right tour_help tour-ri-com">
						<h3>Hỗ trợ và giúp đỡ</h3>
						<div class="tour_help_1">
							<h4 class="tour_help_1_call">Gọi bây giờ</h4>
							<h4><i class="fa fa-phone" aria-hidden="true"></i> 0122 645 2598</h4> 
						</div>
					</div>
					<!--====== Hiển thị tour liên quan ==========-->
					<div class="tour_right tour_rela tour-ri-com">
						<h3>Những tour liên quan</h3>
						@foreach($obj3ItemsLQ as $key => $val)
							@php
								$slug = str_slug($val->tentour);
							@endphp
						<div class="tour_rela_1"> <img width="100px" height="200px" src="/storage/app/files/{{ $val->hinhanh }}" alt="" />
							<a href="{{ route('travel.tour.detail',['slug'=>$slug,'id' => $val->id_chitiet]) }}"><h6>{{ $val->tentour }}</h6></a>
							<h5>Khởi hành tại: {{ $val->diemden }}</h5>
							<h5>Thời gian {{ $val->songay }} ngày / {{ $val->sodem }} đêm</h5>
							<h5>Giá: {{ $val->gianguoilon }}</h5>
							<p>Lịch trình: {{ $val->lichtrinh }}</p>
							<p>Còn: {{ $val->soluongcon }} chỗ</p>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

@stop