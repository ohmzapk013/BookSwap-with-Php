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
	<body style=" background-image: url(images/bg3.jpg);background-repeat:none;">
	<div class="container" style="margin-top:10%;margin-left:30%;">
	<a href="index.html" style="color:#0618af;"><p>BACK TO HOME</P></a>
		<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
			<div class="card-body">
				<h5 class="card-title text-center" style="font-size:30px;">Sign Up</h5>
				<form class="form-signin" method="post" action="register.php">
				<?php include('errors.php'); ?>
				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="username" class="form-control" placeholder="username" required autofocus>
					<label for="inputusername">Username</label>
				</div>

				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="email" name="email" class="form-control" placeholder="email" required autofocus>
					<label for="inputEmail">Email</label>
				</div>

				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="password" name="password_1" class="form-control" placeholder="Password" required>
					<label for="inputPassword">Password</label>
				</div>

				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="password" name="password_2" class="form-control" placeholder="Confirm Password" required>
					<label for="inputPassword">Password</label>
				</div>

				<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="reg_user">Sign Up</button>
				<hr class="my-4">
				<p style="color:#0618af;">
					Already a member? <a href="login.php" style="color:#0618af;">Sign In</a>
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
