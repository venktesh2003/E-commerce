<?php
if(isset($_GET['delete_brands'])){
    $delete_brands = $_GET['delete_brands']; // with the help of this we had acessed the id no 
    // echo $delete_category;
    $delete_query_brands = "delete from brands where brand_id =  $delete_brands ";
    $result = mysqli_query($con ,  $delete_query_brands);
    if($result){
        echo "<script>alert('brands has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands' , '_self')</script>";
    }

}



?>