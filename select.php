<?php
session_start();
require('connect.php');
if(isset($_POST["customer_details"]))
{
    $_SESSION['food_prefer'];
    $output='';
    $query = "SELECT * FROM menu_items WHERE id='".$_POST["customer_details"]."' ";
    $result = mysqli_query($conn,$query);
    
//    if (!$result) {
//        
//    print_r( mysqli_error($conn));
//    exit();
//}
    
    $output .= '<div class="table-responsive">
    <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result)){
$query="INSERT INTO order_details(`id`, `customer_name`, `food_item`, `restaurant_name`,`total_amount`) VALUES ('0','".$_SESSION['name']."','".$row['item_name']."','".$row['restaurant_name']."','".$row['price']."')";
	$ok=mysqli_query($conn,$query); 
        $output .='
                    <tr>
                       <td width="30%"><label>Customer Name</label></td>
                       <td width="70%">'.$_SESSION['name'].'</td>
                    </tr>
                    <tr>
                       <td width="30%"><label>Restaurant Name</label></td>
                       <td width="70%">'.$row['restaurant_name'].'</td>
                    </tr>
                    <tr>
                       <td width="30%"><label>Food Item</label></td>
                       <td width="70%">'.$row['item_name'].'</td>
                    </tr>
                    <tr>
                       <td width="30%"><label>Total Amount</label></td>
                       <td width="70%">'.$row['price'].'</td>
                    </tr>';
    }
    $output .="</table></div>";
    echo $output;
}

?>


