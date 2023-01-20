<?php
require_once "config.php";
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/skeleton.css">
	<link rel="stylesheet" href="../css/layout.css">
	
</head>
<body>

	<!-- Primary Page Layout -->
	<div class="container">
		<div class="form-bg">
			<form method="post">
				<h2>Login</h2>
				<?php
				if(isset($_POST['bsubmit'])) {
				$username=trim(mysqli_real_escape_string($con, $_POST['username']));
				$password=sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
				$sql_login = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password ='$password'") or die (mysqli_error($con));
				if(mysqli_num_rows($sql_login) > 0) {
					$_SESSION['user'] = $username;
					echo"<script>window.location='../index.php';</script>";
				} else { ?>
					<div class="row">
						<div class="col-lg-20 col-lg-offset-3">
							<div class="alert alert-danger alert-dismissable" role="alert">
								<a href="login.php" class="close" data-dissmis="alert" aria-label="close">&times;</a>
								<span class="glyphicon glyphicon-sign" aria-hidden="true"></span>
								<strong>Login Gagal!</strong> username / password salah
							</div>
						</div>
					</div>
				<?php
					}	
				}
				?>
				<p><input type="text" placeholder="Username" name="username" autocomplete="off"></p>
				<p><input type="password" placeholder="Password" name="password"></p>
				<a href="register.php" style="color:#000000; margin-left:2rem;">Register First !</a>
				<button type="submit" name="bsubmit"></button>
			<form>
		</div>
	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>