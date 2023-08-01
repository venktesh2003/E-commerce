<h3 class = "text-center text-success">All Payments</h3>
<table class = "table table-bordered mt-5">
    <thead class = "bg-info">
<?php
//checking the user orders
$get_payments = "select * from user_payments";
$result_payment = mysqli_query($con , $get_payments);
$row_count = mysqli_num_rows($result_payment);


if($row_count==0)
{
    echo "<h2 class = 'text-danger text-center mt-5'>No Payments yet </h2>";
}
else{

    echo "
<tr style='background-color:blue'  class = 'text text-center' class = 'bg-info text-light'>
    <th>Sno</th>
    <th>Amount</th>
    <th>Invoice Number</th>
  
    <th>Payment Mode</th>
    <th>Order Date</th>
    <th>Delete</th>
    <!-- <th></th> -->
</tr>
</thead>
<tbody>";

    $number = 0;
    while($row_data = mysqli_fetch_assoc($result_payment)){
        $order_id = $row_data['order_id'];
        $payment_id_id = $row_data['payment_id'];
        $amount = $row_data['amount'];
        $order_date = $row_data['date'];
        $invoice_number = $row_data['invoice_number'];
        $payment_mode = $row_data['payment_mode'];
        $number++;
        echo " <tr>
        <td style = 'background-color:black;color:white;'> $number</td>
        <td style = 'background-color:black;color:white;'> $amount</td>
        <td style = 'background-color:black;color:white;'>$invoice_number</td>
        <td style = 'background-color:black;color:white;'>$invoice_number</td>
        <td style = 'background-color:black;color:white;'> $payment_mode</td>
        <td style = 'background-color:black;color:white;'>$order_date</td>
        <td style = 'background-color:black;color:white;'><a href  ='' class = 'text-light'><i class = 'fa-solid fa-trash'></i></a></td>
    </tr>";


    }

}

?>

       
       
    </tbody>
</table>