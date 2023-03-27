<?php
session_start();

if(isset($_SESSION['administrador'])){
 header('Location: dashboard.php?window=0');
}else{

   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../plantilla/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../plantilla/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../plantilla/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../plantilla/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plantilla/assets/css/azzara.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<form action="aplicacion/controllers/routes/routes.php" method="post">
			<div class="container container-login animated fadeIn">
			
			<center>    <img src="http://localhost/fupdeco/plantilla/globales/img/logo.png" alt="navbar brand" class="navbar-brand" style="width:280px"></center>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="usuario" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Correo electronico</label>
					<input type="hidden" name="peticion" value="1">
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="clave" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Ingresa tu contraseña</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				
				
				<div class="login-account">
					
					<button type="submit" class="btn" style="background-color: #283b62; color:white; padding: 5px; font-size:20px">Login</button>
				</div>
			</div>
		</div>
		</form>

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Sign Up</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input  id="fullname" name="fullname" type="text" class="form-control input-border-bottom" required>
					<label for="fullname" class="placeholder">Fullname</label>
				</div>
				<div class="form-group form-floating-label">
					<input  id="email" name="email" type="email" class="form-control input-border-bottom" required>
					<label for="email" class="placeholder">Email</label>
				</div>
				<div class="form-group form-floating-label">
					<input  id="passwordsignin" name="passwordsignin" type="password" class="form-control input-border-bottom" required>
					<label for="passwordsignin" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="form-group form-floating-label">
					<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control input-border-bottom" required>
					<label for="confirmpassword" class="placeholder">Confirm Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="agree" id="agree">
						<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
					</div>
				</div>
				<div class="form-action">
					<a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
					<a href="#" class="btn btn-primary btn-rounded btn-login">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
	<script src="../plantilla/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../plantilla/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../plantilla/assets/js/core/popper.min.js"></script>
	<script src="../plantilla/assets/js/core/bootstrap.min.js"></script>
	<script src="../plantilla/assets/js/ready.js"></script>
</body>
</html>