<?php

include('../includes/connect.php');//includeing the file
//below checking or putting the values when the buton are clicked
if(isset($_POST['insert_brand']))
{  
    $brand_title = $_POST['brand_title'];
    //select the data from the database
    $select_query = "select * from brands where brand_title ='$brand_title' ";
    $result_select = mysqli_query($con,$select_query);
   $number = mysqli_num_rows($result_select);
   if($number>0)
   {
    echo "<script>alert('this brand is present in the database' )</script>";
   }
   else{
    $insert = "insert into brands( brand_title) values('$brand_title')";
    $result = mysqli_query($con, $insert);
    if($result)
    {//running the javascript for alerting that inserted successfully
         echo "<script>alert('brand is inserted successfully' )</script>";
    }

   }


   

   
}


?>




<h2 class= "text-center">Insert Brands</h2>

<form action="" method = "post" class = "mb-2">

<div class = "input-group w-90 mb-2">
    <span class = "input-group-text bg-info" id = "basic-addon1"><i class = "fa-solid fa-receipt"></i></span>
    <input type="text"  class = "form-control" name = "brand_title" placeholder="Insert brand" aria-label="brands" aria-describedby="basic-addon1">
</div>

<div class = "input-group w-10 mb-2 m-auto">
    <input type="submit"   class = "bg-info border-0 p-2 my-3" name = "insert_brand" value= "insert brands" class = "bg-info" >
<!-- <button class = "bg-info px-2 my-3 border-0">Insert brands</button> -->

</div>






</form>