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
   <title>Swap Books</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<style>
#search-banner{
    background-image: url("images/swapsec.jpeg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
}
.search-form{
    background: rgba(255, 255, 255, 0.58);
}
h2{
    -webkit-text-fill-color: white;
    -webkit-text-stroke-width: 1px;
    -webkit-text-stroke-color: black;
}
h3.h3{text-align:center;margin:1em;text-transform:capitalize;font-size:1.7em;}

/********************* shopping Demo-1 **********************/
.product-grid{font-family:Raleway,sans-serif;text-align:center;padding:0 0 72px;border:1px solid rgba(0,0,0,.1);overflow:hidden;position:relative;z-index:1}
.product-grid .product-image{position:relative;transition:all .3s ease 0s}
.product-grid .product-image a{display:block}
.product-grid .product-image img{width:100%;height:auto}
.product-grid .pic-1{opacity:1;transition:all .3s ease-out 0s}
.product-grid:hover .pic-1{opacity:1}
.product-grid .pic-2{opacity:0;position:absolute;top:0;left:0;transition:all .3s ease-out 0s}
.product-grid:hover .pic-2{opacity:1}
.product-grid .social{width:150px;padding:0;margin:0;list-style:none;opacity:0;transform:translateY(-50%) translateX(-50%);position:absolute;top:60%;left:50%;z-index:1;transition:all .3s ease 0s}
.product-grid:hover .social{opacity:1;top:50%}
.product-grid .social li{display:inline-block}
.product-grid .social li a{color:#fff;background-color:#333;font-size:16px;line-height:40px;text-align:center;height:40px;width:40px;margin:0 2px;display:block;position:relative;transition:all .3s ease-in-out}
.product-grid .social li a:hover{color:#fff;background-color:#ef5777}
.product-grid .social li a:after,.product-grid .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;letter-spacing:1px;line-height:20px;padding:1px 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
.product-grid .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-20px;z-index:-1}
.product-grid .social li a:hover:after,.product-grid .social li a:hover:before{opacity:1}
.product-grid .product-discount-label,.product-grid .product-new-label{color:#fff;background-color:#ef5777;font-size:12px;text-transform:uppercase;padding:2px 7px;display:block;position:absolute;top:10px;left:0}
.product-grid .product-discount-label{background-color:#333;left:auto;right:0}
.product-grid .rating{color:#FFD200;font-size:12px;padding:12px 0 0;margin:0;list-style:none;position:relative;z-index:-1}
.product-grid .rating li.disable{color:rgba(0,0,0,.2)}
.product-grid .product-content{background-color:#fff;text-align:center;padding:12px 0;margin:0 auto;position:absolute;left:0;right:0;bottom:-27px;z-index:1;transition:all .3s}
.product-grid:hover .product-content{bottom:0}
.product-grid .title{font-size:13px;font-weight:400;letter-spacing:.5px;text-transform:capitalize;margin:0 0 10px;transition:all .3s ease 0s}
.product-grid .title a{color:#828282}
.product-grid .title a:hover,.product-grid:hover .title a{color:#ef5777}
.product-grid .price{color:#333;font-size:17px;font-family:Montserrat,sans-serif;font-weight:700;letter-spacing:.6px;margin-bottom:8px;text-align:center;transition:all .3s}
.product-grid .price span{color:#999;font-size:13px;font-weight:400;text-decoration:line-through;margin-left:3px;display:inline-block}
.product-grid .add-to-cart{color:#000;font-size:13px;font-weight:600}
@media only screen and (max-width:990px){.product-grid{margin-bottom:30px}
}


/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: #ffc107;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}
   </style>
</head>
<body>

<section class="search-banner text-white py-3 " id="search-banner">
<div class="topnav" id="myTopnav">
<?php  if (isset($_SESSION['username'])) : ?>
      <a href="profile.php" class="active"  style="float:right;"><?php echo $_SESSION['username']; ?></a>
      <a href="logout.php" class="active">Log Out</a>
<?php endif ?>
</div>
    <div class="container py-5 my-5">
        <div class="row text-center pb-4">
            <div class="col-md-12">
                <h2 class="text-white">Easy swap</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card search-form">
                    <div class="card-body">
                        <p class="font-weight-light text-dark">Enter Swap book title</p>
                        <form method="post" action="server_swap_books.php" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-md-9">
                                 <div class="form-group ">
                                       <input type="text" name="ntitle" class="form-control" placeholder="book to swipe...">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <input type="submit" name="swap" value="SWAP" class="btn btn-warning  pl-5 pr-5">
                              </div>
                           </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<div class="add_section" style="margin-left:43%;margin-top:6%;margin-bottom:2%;">
  <a href="borrow_books.php"> <button type="button" class="btn btn-primary">Borrow a BOOK</button></a><hr>
  <a href="add_books.php"> <button type="button" class="btn btn-primary">OR <br>ADD a BOOK</button></a><hr style="border :7px solid;">
</div>

<div class="container">
    <h3 class="h3">BOOKS AVAILABLE </h3><hr style="border :7px solid;"> 

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
      

      $sql = "SELECT * FROM `all_books` WHERE 1";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                  
                  
                  echo '<div class="row">
                  <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#">
                              <img src='.$row["book_image"].' width=100px; class="pic-1"/>
                                 
                              </a>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">'.$row["book_title"].'</a></h3>
                              <div class="price">'.$row["book_price"].'
                              </div>
                              <a class="add-to-cart" href="borrow_books.php">borrow</a>
                          </div>
                      </div>
                  </div>
                </div>';
           
            }
         } else {
            echo "0 results";
         }
         $conn->close();
         
      ?>


   </div>

   <section style="height:300px;background-color:#ffc107;">
      </section>



</body>
</html>