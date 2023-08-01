<!-- for using connection first include the file -->

<?php
// why not wirting../includes = includes folder and php file are present at same level ./ will work but not ../;

include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .cart_img{
    width: 80px;
    height:80px;
}

body{
  overflow-x:hidden; 
}
  </style>
    <!-- css-->
    <link rel = "stylesheet" href = "style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce website - cart details</title>
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
    <img src="./images/logo.jpg" alt="logo image" class = "logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contacts</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php  cart_item();?></sup></i></a>
        </li>

        

        
        
      </ul>
     
    </div>
  </div>
</nav>
<!-- ?calling the cart functiom -->
<?php  
cart();
?>
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
    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
  </li>";
  }
else{
  echo " <li class='nav-item'>
  <a class='nav-link' href='./users_area/logout.php'>Logout</a>
</li>";
}?>
    </ul>
</nav>

<!-- third child -->
<div class = "bg-light"></div>
<h3 class = "text-center"> MY STORE</h3>
<p class="text-center">We deal with Quality</p>

</div>




<!-- fourth child-->
<div class =  "container">
    <div class = "row">
      <form action="" method  = "post">
        <table class = "table table-bordered text-center">
           
        <tbody>
          <!-- php code to display dynamic data -->
          <?php 
          // fetching all the details of the cart
          global $con;
          $total_price = 0;
          $get_ip_add= getIPAddress();  // accessing ip address for user
          $cart_query  = "Select * from cart_details where ip_address = '$get_ip_add'";
          $result = mysqli_query($con , $cart_query);
           $result_count = mysqli_num_rows($result);
           if($result_count>0)
           {   
            echo" <thead>
            <tr>
                <th>Product title</th>
                <th>Product image</th>
                <th>Quantity</th>
                <th>Total price</th>
                <th>Remove</th>
                <th colspan='2'>Operation</th>
            </tr>

            <thead>";
           
           

          //based on ip address we are displayinh the tota item in cart
          while($row = mysqli_fetch_array($result))
          {
            $product_id = $row['product_id']; // fetching the product id 
            $select_products = "Select * from products where product_id = '$product_id'";
            $result_products = mysqli_query($con ,  $select_products);
            while($row_product_price= mysqli_fetch_array($result_products)){ //fetching the price for the products
              $product_price = array($row_product_price['product_price']);
              $product_table = $row_product_price['product_price'];
              $product_title =  $row_product_price['product_title'];
              $product_image1 = $row_product_price['product_image1'];
              $product_values= array_sum($product_price); 
               $total_price +=$product_values; 
              
              ?>
            <tr>
                <td><?php echo
                $product_title?></td>
                <td><img src="./images/<?php echo $product_image1 ?>" alt="" class = "cart_img"></td>
                <td><input type  = "text"  name = "qty" id = "" class = "form-input w-50"></td>
                <?php
                 $get_ip_add= getIPAddress(); 
                 if(isset($_POST['update_cart'])) {

                  $quantities = $_POST['qty'];
                  $update_cart = "update cart_details set quantity = $quantities where ip_address='$get_ip_add' ";
                  $result_products_quantity = mysqli_query($con ,$update_cart);
                  $total_price = $total_price* $quantities;
                 }
                
                ?>
                <td><?php echo  $product_table  ?></td>  
                <td><input type= "checkbox" name = "removeitems[]" value = <?php echo $product_id ?>></td>
                
                
                <td>
                    <!-- <button class  ="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                    <input type="submit" class = "bg-info px-3 py-2 border-0 mx-3" value="Update cart" name = "update_cart">
                    <input type="submit" class = "bg-info px-3 py-2 border-0 mx-3" value="Remove cart" name = "remove_cart">
                    
                </td>

            </tr>
            <?php    }  }
       }

       else{
        echo "<h2 class = 'text-center text-danger'>CART IS EMPTY</h2>";
       }
          
          ?>
        </tbody>


</table>

<div class = "d-flex mb-5">
<?php  


global $con;
        
          $get_ip_add= getIPAddress();  // accessing ip address for user
          $cart_query  = "Select * from cart_details where ip_address = '$get_ip_add'";
          $result = mysqli_query($con , $cart_query);
           $result_count = mysqli_num_rows($result);
           if($result_count>0){
            echo "  <h4 class = 'px-3'>Subtotal:<strong class = 'text-info'> $total_price/-</strong></h4>
            <input type='submit' class = 'bg-info px-3 py-2 border-0 mx-3' value='Continue shopping' name = 'continue_shopping'>
            <button class = 'bg-info p-3 py-2 border-0 bg-secondary text-light'><a href='./users_area/checkout.php' class = 'text-light text-decoration-none'>Checkout</a></button>";
           }

           else{
            echo "      <input type='submit' class = 'bg-info px-3 py-2 border-0 mx-3' value='Continue shopping' name = 'continue_shopping'>";
           }
           
           if(isset($_POST['continue_shopping']))
           {
            echo "<script>window.open('index.php','_self')</script>";
           }


?>


  
</div>
</div>
      </div>

      </form>

      <!-- fucntion to remove items -->
      <?php
      function remove_cart_item()
      {
        global $con;
        if(isset($_POST['remove_cart']))
        {
          // we are deleting or removing the items with the help of id
          foreach($_POST['removeitems'] as $remove_id){
            echo $remove_id;
            $delete_query = "Delete from cart_details where product_id =$remove_id";
            $run_delete = mysqli_query($con ,$delete_query );
            if($run_delete)
            {
              echo "<script>window.open('cart.php' , '_self')</script>";
            }
          }
        }
      }
    echo remove_cart_item();


?>


 <?php include('./includes/footer.php');
 ?>


</body>
</html>