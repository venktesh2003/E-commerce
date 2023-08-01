<?php
// include the db connection file

// include('./includes/connect.php');  //giving erro when we had facing includig again and agaoin
?>

<?php
// ALL THE THINGS ARE HERE FOR LIMIT AND DISPLAYING THE DATA
//---------------------------------------------------------------------------------------------------------------------------------------
function getproducts()
{ global  $con;

  // condition to check is set or not  if category and brand is set than only displY THE DATA
  //to choose the specific brand and category we used this two condition
if(!isset($_GET['category'])){

 if(!isset($_GET['brand'])){




    // for random selection put order by rand() inside select Query and for limitation to display product put limit0,no u want
$select_query = "select * from products order by rand() limit 0,9"  ;
$result_query = mysqli_query($con,$select_query);
// fetching all the detail
while($row = mysqli_fetch_assoc($result_query)){
  $product_id  = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description= $row['product_description'];
  $product_image3= $row['product_image3'];
  $product_price= $row['product_price'];
  $category_id= $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // displaying the dynmaic content of the products here the items which we see in main page these are dynamically displayed inside the website using products database
  // error in displaying the images
  echo"<div class='col-md-4 mb-2'>
 
 <div class='card'>
<img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>  
 <p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
 <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div> ";



}
}
}
}
//------------------------------------------------------------------------------------------------------------
//getting all the products
 
function get_all_products(){
  global  $con;

  // condition to check is set or not  if category and brand is set than only displY THE DATA
  //to choose the specific brand and category we used this two condition
if(!isset($_GET['category'])){

 if(!isset($_GET['brand'])){




    // for random selection put order by rand() inside select Query and for limitation to display product put limit0,no u want
$select_query = "select * from products order by rand()"  ;
$result_query = mysqli_query($con,$select_query);
// fetching all the detail
while($row = mysqli_fetch_assoc($result_query)){
  $product_id  = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description= $row['product_description'];
  $product_image3= $row['product_image3'];
  $product_price= $row['product_price'];
  $category_id= $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // displaying the dynmaic content of the products here the items which we see in main page these are dynamically displayed inside the website using products database
  // error in displaying the images
  echo"<div class='col-md-4 mb-2'>
 
 <div class='card'>
<img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>  
 <p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id'class='btn btn-info'>Add to cart</a>
 <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div> ";



}
}
}

}

//---------------------------------------------------------------------------------------------------------------------------------------------

//getting unique  categorires
function get_unique_categories()
{ global  $con;

  // condition to check is set or not  if category and brand is set than only displY THE DATA
  //to choose the specific brand and category we used this two condition
if(isset($_GET['category'])){

 $category_id = $_GET['category'];

  // for random selection put order by rand() inside select Query and for limitation to display product put limit0,no u want
$select_query = "select * from products where category_id = $category_id"  ;
$result_query = mysqli_query($con , $select_query);
$num_of_rows = mysqli_num_rows($result_query);
if($num_of_rows==0)
{
  echo "<h2 class = 'text-danger text-center'>NO STOCK FOR THESE CATEGORY</h2>";
}

// displaying if category is not set

// fetching all the detail
while($row = mysqli_fetch_assoc($result_query)){
  $product_id  = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description= $row['product_description'];
  $product_image3= $row['product_image3'];
  $product_price= $row['product_price'];
  $category_id= $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // displaying the dynmaic content of the products here the items which we see in main page these are dynamically displayed inside the website using products database
  // error in displaying the images
  echo"<div class='col-md-4 mb-2'>
 
 <div class='card'>
<img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>  
 <p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
 <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div> ";



}
}
}

//--------------------------------------------------------------------------------------------------------------------------------------
//getting unique brands

function get_unique_brands()
{ global $con;

  // condition to check is set or not  if category and brand is set than only displY THE DATA
  //to choose the specific brand and category we used this two condition
if(isset($_GET['brand'])){

 $brand_id = $_GET['brand'];

  // for random selection put order by rand() inside select Query and for limitation to display product put limit0,no u want
$select_query = "select * from products where brand_id =$brand_id"  ;
$result_query = mysqli_query($con , $select_query);
$num_of_rows = mysqli_num_rows($result_query);
if($num_of_rows==0)
{
  echo "<h2 class = 'text-danger text-center'>NO STOCK FOR THESE CATEGORY</h2>";
}

// displaying if category is not set

// fetching all the detail
while($row = mysqli_fetch_assoc($result_query)){
  $product_id  = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description= $row['product_description'];
  $product_image3= $row['product_image3'];
  $product_price= $row['product_price'];
  $category_id= $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // displaying the dynmaic content of the products here the items which we see in main page these are dynamically displayed inside the website using products database
  // error in displaying the images
  echo"<div class='col-md-4 mb-2'>
 
 <div class='card'>
<img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>  
 <p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
 <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div> ";



}
}
}







//-------------------------------------------------------------------------------------------------------------------
// DISPLAYING THE BRANDS IN SIDE NAV BAR
 function getbrands()
 {
  // make the variable global insidethis function also;
  global $con;
  $select_brands = "select * from brands";
  $result_brands = mysqli_query($con , $select_brands);
  // $row_data = mysqli_fetch_assoc($result_brands);  // for fetching data fetch_assoc is used parameter is fired query
  // echo $row_data['brand_title'];   // name must be col name in data base
   while($row_data = mysqli_fetch_assoc($result_brands))
   {
     $brand_title = $row_data['brand_title']; // this must same as col name in data base []
     $brand_id = $row_data['brand_id'];

     echo"<li class='nav-item '>
     <a href='index.php?brand  =$brand_id' class='nav-link text-light'>$brand_title</a>
   </li>";
   }
 }


 // function for displaying the functions for categories inside the main display page

 //------------------------------------------------------------------------------------------------------------------------------------------------------
 function getcategories()
 {
  global $con;

  $select_categories = "select * from categories";
  $result_categories = mysqli_query($con , $select_categories);
  // $row_data = mysqli_fetch_assoc($result_brands);  // for fetching data fetch_assoc is used parameter is fired query
  // echo $row_data['brand_title'];   // name must be col name in data base
   while($row_data = mysqli_fetch_assoc($result_categories))
   {
     $category_title = $row_data['category_title']; // this must same as col name in data base []
     $category_id = $row_data['category_id'];

     echo"<li class='nav-item '>
     <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
   </li>";

   // for selecting on hover only give <a href='index.php?category=$category_id'
   }
 }
 //----------------------------------------------------------------------------------------------------------------------------------------------

 //searching the products for search the products we had usedd the like clause
  function search_product()
  {
    global  $con;
  if(isset($_GET['search_data_product']))
  {
    $search_data_value = $_GET['search_data'];

  
$search_query = "select * from products where product_keywords like '%$search_data_value%'"  ;
$result_query = mysqli_query($con,$search_query);
$num_of_rows = mysqli_num_rows($result_query);
if($num_of_rows==0)
{
  echo "<h2 class = 'text-center text-danger'>No result is matched no products for this category </h2>";
}
// fetching all the detail
while($row = mysqli_fetch_assoc($result_query)){
  $product_id  = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description= $row['product_description'];
  $product_image3= $row['product_image3'];
  $product_price= $row['product_price'];
  $category_id= $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // displaying the dynmaic content of the products here the items which we see in main page these are dynamically displayed inside the website using products database
  // error in displaying the images
  echo"<div class='col-md-4 mb-2'>
 
 <div class='card'>
<img src='../admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>  
 <p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
 <a href='product_details.php?product_id= $product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
</div> ";



}
}
  }

// ====--------------------------------
// view detail fucntion

function view_details()
{
  global  $con;
if (isset($_GET['product_id'])){
if(!isset($_GET['category'])){

 if(!isset($_GET['brand'])){

$product_id = $_GET['product_id'];
$select_query = "Select * from products where product_id =$product_id ";


    // for random selection put order by rand() inside select Query and for limitation to display product put limit0,no u want

$result_query = mysqli_query($con,$select_query);
// fetching all the detail
while($row = mysqli_fetch_assoc($result_query)){
  $product_id  = $row['product_id'];
  $product_title = $row['product_title'];
  $product_description= $row['product_description'];
  $product_image1= $row['product_image1'];
  $product_image2= $row['product_image2'];
  $product_image3= $row['product_image3'];
  $product_price= $row['product_price'];
  $category_id= $row['category_id'];
  $brand_id = $row['brand_id'];
  
  // displaying the dynmaic content of the products here the items which we see in main page these are dynamically displayed inside the website using products database
  // error in displaying the images
  echo"<div class='col-md-4 mb-2'>
 
 <div class='card'>
<img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
<div class='card-body'>
 <h5 class='card-title'>$product_title</h5>  
 <p class='card-text'>$product_description</p>
 <p class='card-text'>price: $product_price/-</p>
 <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
 <a href='index.php' class='btn btn-secondary'>Go Home</a>
</div>
</div>
</div>







";

echo"<div class='col-md-8'>
<div class = 'row'>
    <div class = 'col-md-12'>
        <h4 class='text-center tect-info mb-5'>Related products</h4>
    </div>
    <div class = 'col-md-6'>
    <img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
    </div>

    <div class = 'col-md-6'>
    <img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
    </div>
</div>
<!-- displat related card -->
</div>
"

;

}
}
}
}
}
// --------------------------------------------------------------------------------------------
// getting the ip address of the functio

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

// ------------------------------------------------------------------------------------------------
  function cart()
  {
    if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add= getIPAddress();
      $get_product_id = $_GET['add_to_cart'];
      $select_query = "select * from cart_details where ip_address ='$get_ip_add' and product_id = $get_product_id";
      $result_query = mysqli_query($con,$select_query);
      $num_of_rows = mysqli_num_rows($result_query);
      if($num_of_rows>0)
      {
       echo "<script>alert('this data is present inside cart')</script>";
         echo "<script>window.open('index.php','_self')</script>";
      }
      else{
        $insert_query ="insert into cart_details(product_id , ip_address , quantity) values($get_product_id , '$get_ip_add' , 0)";
         $result_query = mysqli_query($con , $insert_query);
         echo "<script>alert('item is added to the cart')</script>";
         echo "<script>window.open('index.php','_self')</script>";

      }


    }
  }



  //Function to get cart item number
  function cart_item()
  {
  // if this add to art is active we had to dynamica;lly change the data or display the njmber inside the cart

    if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add= getIPAddress();
      // $get_product_id = $_GET['add_to_cart'];
      $select_query = "select * from cart_details where ip_address ='$get_ip_add'";
      $result_query = mysqli_query($con,$select_query);
      $count_cart_items = mysqli_num_rows($result_query);
    }
      else{
        global $con;
      $get_ip_add= getIPAddress();
      // $get_product_id = $_GET['add_to_cart'];
      $select_query = "select * from cart_details where ip_address ='$get_ip_add'";
      $result_query = mysqli_query($con,$select_query);
      $count_cart_items = mysqli_num_rows($result_query);

      }
      echo $count_cart_items;


    }
//----------------------------------------------------------------------------------------------
//TOTAL PRICE FUNCTION

  function total_cart_price()
  {
    global $con;
    $total_price = 0;
    $get_ip_add= getIPAddress();  // accessing ip address for user
    $cart_query  = "Select * from cart_details where ip_address = '$get_ip_add'";
    $result = mysqli_query($con , $cart_query);
    //based on ip address we are displayinh the tota item in cart
    while($row = mysqli_fetch_array($result))
    {
      $product_id = $row['product_id']; // fetching the product id 
      $select_products = "Select * from products where product_id = '$product_id'";
      $result_products = mysqli_query($con ,  $select_products);
      while($row_product_price= mysqli_fetch_array($result_products)){ //fetching the price for the products
        $product_price = array($row_product_price['product_price']);
        $product_values= array_sum($product_price); 
         $total_price +=$product_values; }
 }
 echo  $total_price ;
}



// get user order detail
function get_user_order_detail()
{
  global $con; 
  $username = $_SESSION['username'];
  $get_details = "select * from user_table where user_name = '$username'";
  $result_query = mysqli_query($con , $get_details);
  while($row_query = mysqli_fetch_array($result_query)){
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders = "select * from user_orders where user_id =$user_id and order_status = 'pending'";
          $result_orders_query = mysqli_query($con , $get_orders);
          $row_count = mysqli_num_rows($result_orders_query);
          if($row_count>0)
          {
            echo "<h3 class = 'text-center text-success my-5 mb-2' >You have <span class = 'text-danger'>$row_count</span> Pending orders</h3>
            <a href = 'profile.php?my_orders' class = 'text-dark'>Order details</a>";
          }
          else{
            echo "<h3 class = 'text-center text-success my-5 mb-2' >You have  0 Pending orders</h3>
            <a href = '../index.php' class = 'text-dark'>Explore products</a>";
          }
        }
      }
    }


  }


}

?>