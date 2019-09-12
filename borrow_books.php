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
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Borrow Book</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="icon" href="../../favicon.ico">
   <style>
#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
   </style>
</head>
<body>
<a href="index.php"><p>BACK TO HOME</P></a>
      <h3>enter book title to borrow</h3>
        <form class="card card-sm" action="" method="GET">
                    <div class="card-body row no-gutters align-items-center">
                        <!--end of col-->
                        <div class="col">
                        <input type="text" id="myInput" name="query" onkeyup="myFunction()" placeholder="Enter book title..">
                        </div>
                        <!--end of col-->
                        <div class="col-auto" style="padding-left: 45%;">
                            <button class="btn btn-lg btn-success" type="submit" value="Search">BORROW</button>
                        </div>
                        <!--end of col-->
                    </div>
        </form>
        <?php
                $conn = mysqli_connect('localhost', 'root', '', 'BookProject');
                            
                if(! $conn ) {
                    //die('Could not connect: ' . mysql_error());
                }
                /*
                    localhost - it's location of the mysql server, usually localhost
                    root - your username
                    third is your password
                    
                    if connection fails it will stop loading the page and display an error
                */
         ?>

					<!-- search.php connection to database end -->
              <!-- search.php query start -->

                <?php
                $logedInUsername = $_SESSION['username'];
									$query = $_GET['query']; 
									// gets value sent over search form
									
									$min_length = 3;
									// you can set minimum length of the query if you want
									
									if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
										try {
											$query = htmlspecialchars($query); 
											// changes characters used in html to their equivalents, for example: < to &gt;
											
											// $query = mysql_real_escape_string($query);
											// makes sure nobody uses SQL injection
										}
										
										//catch exception
										catch(Exception $e) {
											 echo 'Message: ' .$e->getMessage();
                              }
                              
										
										$raw_result = "SELECT * FROM `all_books` WHERE (`book_title` LIKE '%".$query."%') OR (`book_title` LIKE '%".$query."%')"or die(mysql_error());
										$raw_results = $conn->query($raw_result);
										// * means that it selects all fields, you can also write: `id`, `title`, `text`
										// articles is the name of our table
										
										// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
										// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
										// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
										

										if($raw_results->num_rows > 0){ // if one or more rows are returned do following
											while($row = $raw_results->fetch_assoc()){
                        // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                              $field1name = $row["isbn"];
                              $field2name = $row["book_title"];
         
                        }
                      $sql = "UPDATE users SET requests='$field2name' WHERE username='$logedInUsername'";

                      if ($conn->query($sql) === TRUE) {
                        $sql1 = "UPDATE all_books SET status='taken' WHERE book_title='$field2name'";

                              if ($conn->query($sql1) === TRUE) {
                                echo "Record updated successfully";
                              } else {
                                  echo "Error updating record: " . $conn->error;
                              }
                        header("Location: index.php");
                          
                      } else {
                          echo "Error requesting: " . $conn->error;
                      }
											
										}
										else{ // if there is no matching rows do following
											echo "No results";
										}
										
									}
									else{ // if query length is less than minimum
										// echo "Minimum length is ".$min_length;
									}
                    ?>
</body>
<footer>
   <script>
         function myFunction() {
         // Declare variables 
         var input, filter, table, tr, td, i, txtValue;
         input = document.getElementById("myInput");
         filter = input.value.toUpperCase();
         table = document.getElementById("myTable");
         tr = table.getElementsByTagName("tr");

         // Loop through all table rows, and hide those who don't match the search query
         for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
               txtValue = td.textContent || td.innerText;
               if (txtValue.toUpperCase().indexOf(filter) > -1) {
               tr[i].style.display = "";
               } else {
               tr[i].style.display = "none";
               }
            } 
         }
         }</script>
</footer>
</html>