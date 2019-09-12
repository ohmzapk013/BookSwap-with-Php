<?php include('server_addbooks.php') ?>
<!-- php session check logged in user start -->
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!-- php session check logged in user stop -->
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
	<div class="container" style="margin-left:11%;">
	<a href="index.php"><p>BACK TO HOME</P></a>
		<div class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card card-signin my-5">
			<div class="card-body">
				<h5 class="card-title text-center" style="font-size:30px;">Add a BOOk</h5>
            
            <form class="form-addbook" method="post" action="add_books.php" enctype="multipart/form-data">
				<?php include('errors.php'); ?>
				<div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="isbn" class="form-control" placeholder="ISBN number" required autofocus>
					<label for="inputusername">ISBN</label>
            </div>
            
            <div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="title" class="form-control" placeholder="title of book" required autofocus>
					<label for="inputusername">Book Title</label>
            </div>
            
            <div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="author" class="form-control" placeholder="author of book" required autofocus>
					<label for="inputusername">Book Author</label>
            </div>
            
            <div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="descr" class="form-control" placeholder="book description" required autofocus>
					<label for="inputusername">Description</label>
            </div>
            
            <div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="price" class="form-control" placeholder="book price" required autofocus>
					<label for="inputusername">Price</label>
            </div>
            
            <div class="form-label-group" style="padding-bottom:10px;">
					<input type="text" name="publisher" class="form-control" placeholder="book publisher" required autofocus>
               <label for="inputusername">Publisher</label>
            </div>
            
            <div class="form-label-group" style="padding-bottom:10px;">
					<input type="file" name="image" class="form-control" placeholder="cover image of book" required autofocus>
					<label for="inputusername">Book Image</label>
				</div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="add" >Add new book</button>
            <button type="reset" class="btn btn-default">Reset</button>
				<hr class="my-4">
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
