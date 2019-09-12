<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="icon" href="../../favicon.ico">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body style=" background-image: url(images/bg2.jpg);background-repeat:none;">
	<div class="container" style="margin-top:10%;margin-left:11%;">
	<a href="index.html"><p>BACK TO HOME</P></a>
		<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
			<div class="card-body">
				<h5 class="card-title text-center" style="font-size:30px;">Sign In</h5>
				<form class="form-signin" method="post" action="login.php">
				<?php include('errors.php'); ?>
				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="username" class="form-control" placeholder="username" required autofocus>
					<label for="inputusername">Username</label>
				</div>

				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<label for="inputPassword">Password</label>
				</div>

				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="customCheck1">
					<label class="custom-control-label" for="customCheck1">Remember password</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login_user">Sign in</button>
				<hr class="my-4">
				<p style="color:#120094;">
					Not yet a member? <a href="register.php" style="color:#120094;">Sign up</a>
				</p>
			</form>
			</div>
			</div>
		</div>
		</div>
	</div>
</body>
<footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="../../dist/js/bootstrap.min.js"></script>
</footer>
</html>
