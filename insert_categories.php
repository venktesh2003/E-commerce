<?php

include('../includes/connect.php');//includeing the file
//below checking or putting the values when the buton are clicked
if(isset($_POST['insert_cat']))
{  
    $category_title = $_POST['cat_title'];
    //select the data from the database
    $select_query = "select * from categories where category_title ='$category_title' ";
    $result_select = mysqli_query($con,$select_query);
   $number = mysqli_num_rows($result_select);
   if($number>0)
   {
    echo "<script>alert('this category is present in the database' )</script>";
   }
   else{
    $insert = "insert into categories( category_title) values('$category_title')";
    $result = mysqli_query($con, $insert);
    if($result)
    {//running the javascript for alerting that inserted successfully
         echo "<script>alert('category is inserted successfully' )</script>";
    }

   }


   

   
}


?>


<h2 class= "text-center">Insert categories</h2>



<form action="" method = "post" class = "mb-2">

<div class = "input-group w-90 mb-2">
    <span class = "input-group-text bg-info" id = "basic-addon1"><i class = "fa-solid fa-receipt"></i></span>
    <input type="text"  class = "form-control" name = "cat_title" placeholder="Insert categories" aria-label="categories" aria-describedby="basic-addon1">
</div>

<div class = "input-group w-10 mb-2 m-auto">
    <input type="submit"  class = "form-control bg-info b-0 p-2 my-3" name = "insert_cat" value= "insert categories" class = "bg-info" >
<!-- <button class = "bg-info px-2 my-3 border-0">Insert categories</button> -->

</div>






</form>