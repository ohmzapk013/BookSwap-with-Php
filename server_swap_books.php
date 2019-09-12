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
	
	$logedInUsername = $_SESSION['username'];
	if(isset($_POST['swap'])){		

        $ntitle = trim($_POST['ntitle']);
        $ntitle = mysqli_real_escape_string($db, $ntitle);
        
		// $query = "UPDATE users SET requests='' WHERE requests='$ntitle'";
		$query = "SELECT `status` FROM `all_books` WHERE status = 'taken'";
		$result = mysqli_query($db, $query);
		if(!$result){
			
			$query1 = "UPDATE users SET requests='' WHERE requests='$ntitle'";

			if ($db->query($query1) === TRUE) {
				echo "Record updated successfully";
				$sql = "UPDATE users SET requests='$ntitle' WHERE username='$logedInUsername'";
				$result = mysqli_query($db, $sql);
				header("Location: index.php");
			} else {
				echo "Error updating record: " . $db->error;
			}
			
		} else {
			echo "book is taken at the moment";
		}
	}
?>