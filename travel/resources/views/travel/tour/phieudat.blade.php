@extends('templates.travel.master')
@section('css')
	<style type="text/css">
		.noidung{
			width: 1000px;
			/* background-color: pink; */
			margin: 0px auto;
			margin-bottom: 40px;
			/* border-top: dashed; */
		}
		.noidung h3{
			float: left;
			/* background-color: yellow; */
		}
		th,td{
			 text-align: left;
			 padding-left: 10px; 
			 margin-bottom: 10px
		}
		.tttour{
			width: 1000px;
		}
		.csach h3{
			/* float: left; */
			width: 1000px;
		}
		.csach p{
			width: 900px;
			padding-left: 50px;
			padding-right: 50px;
		}
		.dat{
			width: 1000px;
		}
		.dat td{
			padding-bottom: 10px;
		}
		select {
		    display: block;
		}
		.mau li{
	      color: red;
	    }
	    textarea {
	    width: 100%;
	    height: 25rem
		}
	</style>
@stop 
@section('content')
	<div class="noidung">
		<h3 style="color: blue">Thông tin tour đã chọn</h3>
		<h3>@if ($errors->any())
		  <div>
		      <ul>
		          @foreach ($errors->all() as $error)
		              <li>{{ $error }}</li>
		          @endforeach
		      </ul>
		  </div>
		@endif</h3>
		
		@foreach($objItem as $key => $val)
		    @php
		    $slug = str_slug($val->tentour);
		    @endphp
		<div>
			<table border="1px" class="tttour">
				
				<tbody>
					<tr>
						<td rowspan="6"><img width ="570px" height="300px" src="/storage/app/files/{{ $val->hinhanh }}"/></td>
						<td><h3 style="color: red">{{ $val->tentour }}</h3></td>
					</tr>
					<tr>
						<td><h4><span style="color: green">Số lượng còn:</span> {{ $val->soluongcon }}</h4></td>
					</tr>
					<tr>
						<td><h4><span style="color: green">Thời gian:</span> {{ $val->songay }} Ngày {{ $val->sodem }} đêm.</h4></td>
					</tr>
					<tr>
						<td><h4><span style="color: green">Ngày khởi hành:</span> {{ $val->ngaydi }}</h4></td>
					</tr>
					<tr>
						<td><h4><span style="color: green">Khởi hành tại:</span> {{ $val->diemden }} ({{$val->tentinh}})</h4></td>
					</tr>
					<tr>
						<td><h4><span style="color: green">Giá tiền:</span> {{ $val->gianguoilon }} VNĐ</h4></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="dat">
			<h3 style="color: blue">Thông tin phiếu đặt</h3>
			<form action="{{ route('travel.tour.phieudat',['id' => $val->id_chitiet,'slug'=>$slug]) }}" method="post">
				{{ csrf_field()}}
				<table border="1px">
				<tbody>
					<tr>
						<td><b>Họ tên khách hàng</b></td>
						<td><input type="text" placeholder="Nhập vào tên khách hàng" name="hoten" value="{{ $ten }}" required readonly>  </td>
					</tr>
					<tr>
						<td><b>Trẻ em</b></td>
						<td><select name="treem" class="it">
					      <option value="0">--- Chọn trẻ em ---</option>
					       @php
					          $i=1;
					       @endphp
					        @for($i==1;$i<=20;$i++)
					        <option value="{{ $i }}">{{ $i }}</option>
					        @endfor
					      </select>
					  	</td>
					</tr>
					<tr>
						<td><b>Trẻ nhỏ</b></td>
						<td class="sl"><select name="trenho">
						      <option value="0">--- Chọn trẻ nhỏ ---</option>
						       @php
						          $i=1;
						       @endphp
						        @for($i==1;$i<=20;$i++)
						        <option value="{{ $i }}">{{ $i }}</option>
						        @endfor
						     </select>
					  	</td>
					</tr>
					<tr>
						<td><b>Người lớn</b></td>
						<td><select name="nguoilon">
						      <option value="0">--- Chọn trẻ người lớn ---</option>
						       @php
						          $i=1;
						       @endphp
						        @for($i==1;$i<=20;$i++)
						        <option value="{{ $i }}">{{ $i }}</option>
						        @endfor
						      </select>
					  	</td>
					</tr>
					<tr>
						<td><b>Thông tin khách đi cùng</b></td>
						<td><textarea rows="20" cols="200" height ="200px" placeholder="CMND, họ tên , ngày sinh đầy đủ" name="ghichu" ></textarea>
					  	</td>
					</tr>
					<tr>
						<td><button style ="background-color: yellow" type="submit">Đặt tour</button>
						</td>
						<td><input class="login100-form-btn" type="reset" value="Hủy"></td>
					</tr>
					<tr>
						
					</tr>
				</tbody>
			</table>
			</form>	
		</div>
		@endforeach
		<div class="csach">
			<h3 style="color: blue">Chính sách điều khoản thanh toán</h3>
			<p>Tổng Lãnh sự quán Hàn Quốc tại Thành phố Hồ Chí Minh chỉ phụ trách nhận hồ sơ xin visa đối với người hiện đang sinh sống ở khu vực miền Nam từ  Quảng Nam trở vào. Đối với những người sinh sống từ  Đà Nẵng  trở ra Bắc, xin vui lòng nộp hồ sơ xin visa tại Đại sứ quán Hàn Quốc tại Hà Nội.</p>
			<p>Tổng Lãnh sự quán Hàn Quốc tại Thành phố Hồ Chí Minh chỉ phụ trách nhận hồ sơ xin visa đối với người hiện đang sinh sống ở khu vực miền Nam từ  Quảng Nam trở vào. Đối với những người sinh sống từ  Đà Nẵng  trở ra Bắc, xin vui lòng nộp hồ sơ xin visa tại Đại sứ quán Hàn Quốc tại Hà Nội.</p>
			<p>Tổng Lãnh sự quán Hàn Quốc tại Thành phố Hồ Chí Minh chỉ phụ trách nhận hồ sơ xin visa đối với người hiện đang sinh sống ở khu vực miền Nam từ  Quảng Nam trở vào. Đối với những người sinh sống từ  Đà Nẵng  trở ra Bắc, xin vui lòng nộp hồ sơ xin visa tại Đại sứ quán Hàn Quốc tại Hà Nội.</p>
			<p>Tổng Lãnh sự quán Hàn Quốc tại Thành phố Hồ Chí Minh chỉ phụ trách nhận hồ sơ xin visa đối với người hiện đang sinh sống ở khu vực miền Nam từ  Quảng Nam trở vào. Đối với những người sinh sống từ  Đà Nẵng  trở ra Bắc, xin vui lòng nộp hồ sơ xin visa tại Đại sứ quán Hàn Quốc tại Hà Nội.</p>
			<p>Tổng Lãnh sự quán Hàn Quốc tại Thành phố Hồ Chí Minh chỉ phụ trách nhận hồ sơ xin visa đối với người hiện đang sinh sống ở khu vực miền Nam từ  Quảng Nam trở vào. Đối với những người sinh sống từ  Đà Nẵng  trở ra Bắc, xin vui lòng nộp hồ sơ xin visa tại Đại sứ quán Hàn Quốc tại Hà Nội.</p>
		</div>
	</div>
		
		
@stop
@section('js')
    @if(!empty(session('msg')))
    <script type="text/javascript" >alert("{{ session('msg') }}")</script>
     @endif  
@stop