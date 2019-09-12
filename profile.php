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

<p>My books</p>
<?php
$db = mysqli_connect('localhost', 'root', '', 'BookProject');

$logedInUsername = $_SESSION['username'];


$sql = "SELECT * FROM `all_books` WHERE owner = '$logedInUsername'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>book name: " . $row["book_title"]."<br>price: " . $row["book_price"]."<img src='".$row['book_image']."' width=100px;/><br><hr>";
    }
} else {
    echo "0 results";
}
$db->close();
?>
<br>
<p>books taken</p>
<?php
$db = mysqli_connect('localhost', 'root', '', 'BookProject');

$logedInUsername = $_SESSION['username'];


$sql = "SELECT * FROM `all_books` WHERE owner = '$logedInUsername' AND status = 'taken'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>book name: " . $row["book_title"]."<br>price: " . $row["book_price"]."<img src='".$row['book_image']."' width=100px;/><br><hr>";
        $field2name = $row["book_title"];

        $sql1 = "SELECT * FROM `users` WHERE requests = '$field2name'";
        $result = $db->query($sql1);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "id: " . $row["username"]. " - Name: " . $row["email"].  "<br>";
                }
            } else {
                echo "0 results";
            }
    }
} else {
    echo "0 results";
}
$db->close();
?>