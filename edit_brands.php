<?php

if(isset($_GET['edit_brands'])){
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "select * from brands where brand_id = $edit_brands";
    $result_brand = mysqli_query($con , $get_brands);
    $row = mysqli_fetch_assoc( $result_brand );
    $brand_title = $row['brand_title'];





}

if(isset($_POST['edit_brand'])){
    $brand_title = $_POST['brand_title'];
    $update_query = "update brands set brand_title = '$brand_title' where brand_id =   $edit_brands";
    $result_brand = mysqli_query($con  ,$update_query);
    if( $result_brand)
    {
        echo "<script>alert('Brand has been updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands', '_self')</script>";
    }
}

// if(isset($_POST['edit_cat'])){
//     $cat_title = $_POST['category_title'];
//     $update_query = "update categories set category_title = '$cat_title' where category_id = $edit_category";
//     $result_cat = mysqli_query($con  ,$update_query);
//     if($result_cat)
//     {
//         echo "<script>alert('categories has been updated successfully')</script>";
//         echo "<script>window.open('./index.php?view_categories', '_self')</script>";
//     }
// }








?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container mt-3">
    <h1 class = "text-center">Edit Brand</h1>
    <form action="" method = "post" class = "text-center">
   <div class= "form-outline mb-4">
    <label for="brand_title" class = "form-label">Brand Title</label>
    <input type="text" name = "brand_title" class = "form-control" required = "required" value = <?php echo $brand_title ?>>
   </div>
   <input type = "submit" value = "Update Brands" class = "btn btn-info" name = "edit_brand">
    </form>
</div>
</body>
</html>



