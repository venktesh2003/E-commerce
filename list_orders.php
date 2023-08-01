<h3 class = "text-center text-success">All Orders</h3>
<table class = "table table-bordered mt-5">
    <thead class = "bg-info">
<?php
//checking the user orders
$get_orders = "select * from user_orders";
$result = mysqli_query($con , $get_orders);
$row_count = mysqli_num_rows($result);


if($row_count==0)
{
    echo "<h2 class = 'text-danger text-center mt-5'>No orders yet </h2>";
}
else{

    echo "
<tr style='background-color:blue'  class = 'text text-center' class = 'bg-info text-light'>
    <th>Sno</th>
    <th>Due Amount</th>
    <th>Invoice Number</th>
    <th>Total Products</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Delete</th>
    <!-- <th></th> -->
</tr>
</thead>
<tbody>";

    $number = 0;
    while($row_data = mysqli_fetch_assoc($result)){
        $order_id = $row_data['order_id'];
        $user_id = $row_data['user_id'];
        $amount_due = $row_data['amount_due'];
        $order_date =$row_data['order_date'];
        $total_products = $row_data['total_products'];
        $order_status = $row_data['order_status'];
        $invoice_number = $row_data['invoice_number'];
        $number++;
        echo " <tr>
        <td style = 'background-color:black;color:white;'> $number</td>
        <td style = 'background-color:black;color:white;'> $amount_due</td>
        <td style = 'background-color:black;color:white;'>$invoice_number</td>
        <td style = 'background-color:black;color:white;'>$total_products</td>
        <td style = 'background-color:black;color:white;'>$order_date</td>
        <td style = 'background-color:black;color:white;'>$order_status</td>
        <td style = 'background-color:black;color:white;'><a href  ='' class = 'text-light'><i class = 'fa-solid fa-trash'></i></a></td>
    </tr>";


    }

}

?>

       
       
    </tbody>
</table>