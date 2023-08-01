<!-- including the php file for connecting -->
<?php
include('../includes/connect.php');
// inserting products
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images for accessing image you have to give the name and for uploading the images the method should not be post it should be files otherwise it will give the error

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image temporary names there should be a seprate variable inside the image
    
    $temp_image1 =  $_FILES['product_image1']['tmp_name'];
    $temp_image2 =  $_FILES['product_image2']['tmp_name'];
    $temp_image3 =  $_FILES['product_image3']['tmp_name'];
   
//checking empty condition
if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){

    echo "<script>alert('please fill all the available fields')</script>";
    exit();
}
else{
    // writing code to move the images inside the database we dont need to ove the image manually inside folder name product images
    // method for moving the images to folder take two parameter one i image name second is it take path of folder
  move_uploaded_file($temp_image1,"./product_images/$product_image1");
  move_uploaded_file($temp_image2,"./product_images/$product_image2");
  move_uploaded_file($temp_image3,"./product_images/$product_image3");

  // insert the products now 

$insert_products = "insert into products(product_title ,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,	status) values ('$product_title' , '$description','$product_keywords','$product_category','$product_brands',' $product_image1' , ' $product_image2','$product_image3','$product_price',NOW(),'$product_status')";

  $result_query = mysqli_query($con, $insert_products);
  if($result_query){
    echo "<script>alert('Successfully inserted the products')</script>";
  }
}



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- css file link -->
<link rel="stylesheet" href="../style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product admin dashboard</title>
</head>
<body class = "bg-light">
    <div class="container mt-3">
        <h1 class = "text-center">Insert products</h1>
        <form action="" method = "post"  enctype = "multipart/form-data">
            <!-- inside form we are not giving any action because itsef is action  -->
        <!-- for uploading images we used enctype = "multipart/form-data" -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class = "form-label">Product title</label>
            <input type="text" name = "product_title" id = "product_title" class = "form-control" placeholder="enter the product title" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->

        </div>

        <!-- description -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class = "form-label">Product Description</label>
            <input type="text" name = "description" id = "description" class = "form-control" placeholder="enter the product description" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->

        </div>

        <!-- keywords -->

        

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class = "form-label">Product Keywords</label>
            <input type="text" name = "product_keywords" id = "product_keywords" class = "form-control" placeholder="enter the keywords" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->

        </div>


        <!-- categories-->

        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categories" id="" class = "form-select">
                <!-- here data will come from categories whic we inserted in data base -->
                <option value="">Select Categories</option>

                <?php

                   $select_query = "select * from categories";
                   $result_query  =mysqli_query($con , $select_query);
                   while($row = mysqli_fetch_assoc($result_query))
                   {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                    
                   }
                ?>
                <!-- <option value="">c1</option>
                <option value="">c2</option>
                <option value="">c3</option>
                <option value="">c4</option> -->
            </select>
        </div>

        <!-- brands this data should be dynamic -->
        <!-- form select classs for applying style to the bootstrap -->

        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class = "form-select">
                <!-- here data will come from categories whic we inserted in data base -->
                <option value="">Select Brands</option>
                <?php

$select_query = "select * from brands";
$result_query  =mysqli_query($con , $select_query);
while($row = mysqli_fetch_assoc($result_query))
{
 $brand_title = $row['brand_title'];
 $brand_id = $row['brand_id'];
 echo "<option value='$brand_id'>$brand_title</option>";
 
}
?>
            </select>
        </div>
        

        <!-- inserting the images  for inserting images you can upload file by input = file -->

 <!--Image1 -->

        

 <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class = "form-label">Product Image1</label>
            <input type="file" name ="product_image1" id = "product_image1" class = "form-control" placeholder="enter the Image" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->

        </div>

        <!-- image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class = "form-label">Product Image2</label>
            <input type="file" name ="product_image2" id = "product_image2" class = "form-control" placeholder="enter the Image" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->
        </div>
        <!-- image 3 -->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class = "form-label">Product Image3</label>
            <input type="file" name = "product_image3" id = "product_image3" class = "form-control" placeholder="enter the Image" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->
</div>


 <!-- Price -->

        

 <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class = "form-label">Product price</label>
            <input type="text" name = "product_price" id = "product_price" class = "form-control" placeholder="enter the price" autocomplete="off" required>
            <!-- for and id should be matching;  autocomplete off for suggestion ;
        m- auto = for equal spacing -->

        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name= "insert_product" class = "btn btn-info mb-3 px-3" value  = "insert products">

        </div>

        
        
        
        </form>  

    </div>

    
</body>
</html>