<html>
	<header>
		<title>404</title>
		<style type="text/css" media="screen">
			.center{
				margin: 0px auto;
				width: 100%;
			}
		</style>
	</header>
	<body bgcolor="pink">
		<div class="center">
			<h2 align="center"><span style="color: red">{{ session('msg') }}</span></h2>
			<a href="#"><img width="100%" height="550px" src="{{ $urlAdmin }}/img/tenor.gif" alt=""></a>
			<h3><input type="submit" value="QUAY LẠI" onclick="window.history.back()"/></h3>
		</div>
	</body>
</html>