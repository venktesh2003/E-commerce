<!DOCTYPE html>
<html lang="en">
<head>

    <!-- css file link -->
<link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<!-- font awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view products</title>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- <h1>View Products</h1> -->
    <h1 class= "text-center text-success">All Products</h1>
    <table class = "table table-bordered mt-5">
        <thead class ="bg-info" style = "background-color:blue;">
            <!-- <tr> -->
                <th>product id</th>
                <th>product title</th>
                <th>product image</th>
                <th>product price</th>
                <th>total sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>

        </thead>
        <tbody class ="bg-secondary text-light">
            <?php
            
            
            $get_products = "select * from products";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id = $row['product_id']; 
                $product_title = $row['product_title']; 
                $product_image3 = $row['product_image3']; 
                $product_price = $row['product_price']; 
                $status = $row['status']; 
                $number++;
                ?>
                <!-- we closed the above our php because of the we need to write for the code -->
                <tr class = "text-center" >
                 <td style = "background-color:black ;color:white"><?php echo $number?></td>
                 <td style = "background-color:black; color:white"><?php echo $product_title?></td>
                 <td style = "background-color:black; color:white"><img src = './product_images/<?php echo $product_image3;?>' style = 'width:100px;object-fit:contain;'></td>
              <td style = "background-color:black;color:white;"><?php echo $product_price ?></td>
              <td style = "background-color:black;color:white;"><?php
              $get_count = "select * from orders_pending where product_id  =$product_id ";
              $result_count = mysqli_query($con , $get_count);
              $rows_count = mysqli_num_rows($result_count);
              echo $rows_count;

              
              ?></td>
                 <td style = "background-color:black;color:white;"><?php echo $status?></td>
                 <td style = "background-color:black;"><a href  ='index.php?edit_products=<?php echo  $product_id ?>' class = 'text-light' ><i class = 'fa-solid fa-pen-to-square'></i></a></td>
                 <td style = "background-color:black;color:white;"><a href  ='index.php?delete_product= <?php echo $product_id?>' class = 'text-light' ><i class = 'fa-solid fa-trash'></i></a></td>
              </tr>
               <?php


            }

             
            ?>
           
        </tbody>
    </table>
    
</body>
</html>