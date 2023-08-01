<h3 class = "text-center text-success">All Categories</h3>
<table class = "table table-bordered mt-5">
    <thead >
        <tr style = "background-color:blue;" class = "text text-center" class = "bg-info text-light">
            <th>sno</th>
            <th>category title</th>
            <th>edit</th>
            <th>Delete</th>
        </tr>
    </thead>
 <tbody class = "bg-secondary text-light">
    <?php
    $select_cat = "select * from categories";
    $result = mysqli_query($con , $select_cat);
    $number = 0;
    while($row = mysqli_fetch_assoc($result)){
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
        $number++; 
    ?>
    <tr class = "text-center">
    <td style = "background-color:black;color:white;"><?php echo $number; ?></td>
    <td style = "background-color:black;color:white;"><?php echo $category_title;?></td>
   
 <td style = "background-color:black;"><a href  ='index.php?edit_category= <?php echo $category_id ?>' class = 'text-light' ><i class = 'fa-solid fa-pen-to-square'></i></a></td>
    <td style = "background-color:black;color:white;"><a href  ='index.php?delete_category= <?php echo $category_id ?>' class = 'text-light' ><i class = 'fa-solid fa-trash'></i></a></td>
    </tr>
    <?php
    }
    
    ?>



 </tbody>



</table>