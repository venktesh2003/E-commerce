<h3 class = "text-center text-success">All Users</h3>
<table class = "table table-bordered mt-5">
    <thead class = "bg-info">
<?php
//checking the user orders
$get_user = "select * from user_table";
$result_user = mysqli_query($con , $get_user);
$row_count_user = mysqli_num_rows($result_user);


if($row_count_user==0)
{
    echo "<h2 class = 'text-danger text-center mt-5'>No USERS yet </h2>";
}
else{

    echo "
<tr style='background-color:blue'  class = 'text text-center' class = 'bg-info text-light'>
    <th>Sno</th>
    <th>User email</th>
    <th>User Image</th>
  
    <th>User Address</th>
    <th>User Mobile</th>
    <th>Delete</th>
    <!-- <th></th> -->
</tr>
</thead>
<tbody>";

    $number = 0;
    while($row_data = mysqli_fetch_assoc($result_user)){
        $user_id = $row_data['user_id'];
        $user_email = $row_data['user_email'];
        $user_image= $row_data['user_image'];
        $user_address = $row_data['user_address'];
        $user_mobile = $row_data['user_mobile'];
      
        $number++;
        echo " <tr>
        <td style = 'background-color:black;color:white;'> $number</td>
        <td style = 'background-color:black;color:white;'>  $user_email</td>
        <td style = 'background-color:black;color:white;'><img src = '../users_area/user_images/$user_image' style ='width:100px;object-fit:contain;'></td>
        <td style = 'background-color:black;color:white;'>  $user_address</td>
        <td style = 'background-color:black;color:white;'>  $user_mobile</td>
        <td style = 'background-color:black;color:white;'><a href  ='' class = 'text-light'><i class = 'fa-solid fa-trash'></i></a></td>
    </tr>";


    }

}

?>

       
       
    </tbody>
</table>