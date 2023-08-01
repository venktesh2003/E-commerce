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
    $select_brand = "select * from brands";
    $result_brand = mysqli_query($con ,  $select_brand);
    $number = 0;
    while($row = mysqli_fetch_assoc($result_brand)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        $number++; 
    ?>
    <tr class = "text-center">
    <td style = "background-color:black;color:white;"><?php echo  $number; ?></td>
    <td style = "background-color:black;color:white;"><?php echo $brand_title;?></td>
   
 <td style = "background-color:black;"><a href  ='index.php?edit_brands = <?php echo $brand_id ?>' class = 'text-light' ><i class = 'fa-solid fa-pen-to-square'></i></a></td>
    <td style = "background-color:black;color:white;"><a href  ='index.php?delete_brands = <?php echo $brand_id ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"  ><i class = 'fa-solid fa-trash'></i></a></td>
    </tr>
    <?php
    }
    
    ?>



 </tbody>



</table>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
           <div class="modal-body">
       <h4>Are you Sure you want to delete this????</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href = "index.php?view_brands" class= "text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href  ='index.php?edit_brands = <?php echo $brand_id ?>'  class=" text-light" data-toggle="modal" data-target="#exampleModal"  >Yes</a></button>
      </div>
    </div>
  </div>
</div>