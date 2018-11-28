<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập travel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ $urlLogin }}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ $urlLogin }}/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{ $urlLogin  }}/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Đăng nhập
					</span>
				</div>

				<form action="{{ route('auth.auth.login') }}" method="post" class="login100-form validate-form">
					{{ csrf_field() }}
					<span style="color: red">{{ session('msg') }}</span>
					<div class="wrap-input100 validate-input m-b-26" data-validate="phải nhập tên đăng nhập">
						<span class="label-input100">Tên đăng nhập</span>
						<input class="input100" type="text" name="username" placeholder="Nhập tên đăng nhập">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "phải nhập mật khẩu">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="pass" placeholder="Nhập mật khẩu">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
						<input class="login100-form-btn" type="reset" value="Hủy">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ $urlLogin }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ $urlLogin }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ $urlLogin }}/js/main.js"></script>

</body>
</html>