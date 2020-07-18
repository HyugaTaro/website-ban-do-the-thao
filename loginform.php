<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loginform</title>
	<!-- bootstrap và jquery -->
	<link rel="stylesheet" href="vender/css/bootstrap.css">
	<script type="text/javascript" src="vender/js/jquery.min.js"></script>
	<script type="text/javascript" src="vender/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vender/css/bootstrap.min.css"></script>
	<!-- css và jquery -->
	<link rel="stylesheet" href="css/stylelogin.css">
	<script type="text/javascript" src="jquery/index.js"></script>
</head>
<body class="background">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-3 col-sm-6 col-xs-12 row-container">
				<form action="Loginform.php" method="POST">
					<h3 class="textcolor">Mời bạn đăng nhập</h3>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" name="txt_tendn" class="form-control" id="email" placeholder="Nhập email">
						<p class="emailError"></p>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="txt_pass" class="form-control" id="password" placeholder="Nhập password">
						<p class="passwordError"></p>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="renemberme">
						<label class="form-check-label" id="renemberme">Check me out</label>
					</div>
					<button type="submit" name="btn_dangnhap" class="btn btn-success btn-block my-3">login</button>
					<button class="btn btn-lg btn-google btn-block" type="submit"><i class="fab fa-google mr-2"></i>Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
				</form>
			</div>
		</div>
	</div>
	<?php 
		require('xuly_login.php');
	?>
</body>
</html>