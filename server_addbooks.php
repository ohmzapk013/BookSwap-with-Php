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
<?php
	session_start();
	
    // initializing variables
    $username = "";
    $email    = "";
    $errors = array(); 

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'BookProject');

	if(isset($_POST['add'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($db, $isbn);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($db, $title);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($db, $author);;
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($db, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($db, $price);
		
		$publisher = trim($_POST['publisher']);
		$publisher = mysqli_real_escape_string($db, $publisher);

		$logedInUsername = $_SESSION['username'];

		// add image
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}

		// find publisher and return pubid
		// if publisher is not in db, create new
		$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
		$findResult = mysqli_query($db, $findPub);
		if(!$findResult){
			// insert into publisher table and return id
			$insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
			$insertResult = mysqli_query($db, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($db);
				exit;
			}
			$publisherid = mysql_insert_id($db);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$publisherid = $row['publisherid'];
		}
	


		$query = "INSERT INTO all_books(`book_isbn`, `book_title`, `book_author`, `book_descr`, `book_price`, `publisherid`, `book_image`,`owner`) VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $descr . "', '" . $price . "', '" . $publisherid . "', '" . $target_file . "', '" . $logedInUsername. "')";
		$result = mysqli_query($db, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($db);
			exit;
		} else {
			header("Location: index.php");
		}
	}
?>