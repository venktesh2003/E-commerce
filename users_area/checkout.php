<!-- for using connection first include the file -->

<?php
// why not wirting../includes = includes folder and php file are present at same level ./ will work but not ../;

include('../includes/connect.php');
// include('functions/common_function.php');
  session_start(); // @because if this page is active than only the sesso will e active

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- css-->
    <link rel = "stylesheet" href = "style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
    <!--bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--font awesome linklink -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
   <!-- bootstrap js link-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

   <!-- nav bar -->
 <div class = "container-fluid p-0">

<!-- first child of container -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">  
  <div class="container-fluid ">
    <img src="../images/logo.jpg" alt="logo image" class = "logo" style = "width:7%;
    height:7%;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>

        
      </ul>
      <form class="d-flex" action = "search_product.php" method = "get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name = "search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value = "SEARCH" class = "btn btn-outline-light" name = "search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- ?calling the cart functiom -->

<!--second child-->
<nav class = "navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class= "navbar-nav me-auto">


        <?php

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Welcome Guest</a>
  </li>";
}

else{
  echo "<li class='nav-item'>
<a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
</li>";
}
  if(!isset($_SESSION['username'])){
    echo " <li class='nav-item'>
    <a class='nav-link' href='./user_login.php'>Login</a>
  </li>";
  }
else{
  echo " <li class='nav-item'>
  <a class='nav-link' href='logout.php'>Logout</a>
</li>";
}


?>

       
    </ul>
</nav>

<!-- third child -->
<div class = "bg-light"></div>
<h3 class = "text-center"> MY STORE</h3>
<p class="text-center">We deal with Quality</p>


<!-- fourth child-->

<div class="row">
    <!-- products  mb = margin bottom , md = display-->
<div class="col-md-12">
<div class="row">
  <?php  if(!isset($_SESSION['username'])) {
    include('user_login.php');// for redirecting the page 
  }
  else{
    include('payment.php'); //if user is login than go to payement other wise go to login
  }
  
  
  
  
  ?>




<!-- row ending div -->

<!-- side nav bar md - medium bg-secondary for background color -->
</div>
<!-- column ending div -->
</div>
 <div class="col-md-2 bg-secondary p-0">
  
  <!-- me:auto meaning margin end to be auto   in a tag text-light for light text .,bg-info==background color,   text -center for centering the text-->
  <!-- brands to be displayed -->
  <!-- <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
    </li>


   writing the query for displaying bransnds in side nav bar -->
  
  <!-- </ul> -->
 

    

   <!-- caregories to be displayed
<ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
    </li> -->




   <!-- </ul> -->


   
  
</div>
</div>
<!-- last child our footer-
 <div class ="bg-info p-3 text-center">
    <p>All rights reserved &copyright designed by Venktesh</p>
</div> -->
<!-- include footer.php -->
<?php
include('../includes/footer.php');
?>


</body>
</html>