<?php
if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category']; // with the help of this we had acessed the id no 
    // echo $delete_category;
    $delete_query = "delete from categories where category_id = $delete_category ";
    $result = mysqli_query($con , $delete_query);
    if($result){
        echo "<script>alert('category has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories' , '_self')</script>";
    }

}



?>