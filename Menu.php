<?php
 session_start();
if(!isset($_SESSION['user'])){
    header("location:RestaurantLogin.php");
 }           
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">

<title>Menu Page</title>
</head>
    
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">foodShala.com</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="logout.php">Logout</a>
        </div>
      </div>
    </nav>    
    
    <div class='container'>
        <div class="row"> 
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <center><h4><b>Food Menu Items</b></h4></center>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th> Food Preference</th>
                                <th> Food Items</th>
                                <th> Price</th>
                                <th>  Description</th>
                                <th> Restaurant Name</th>
                                <th> Image</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <?php
                        require('connect.php');
                        if($_SESSION['user']=='customer'){
                        $query ="select * from menu_items where food_prefer='" .$_SESSION['food_prefer']."' ";
                        $result = mysqli_query($conn, $query); 
                        if ( isset($result->num_rows) && $result->num_rows >0) {
                            while($row=$result->fetch_assoc()){
                        ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['food_prefer']; ?> </td>
                                <td> <?php echo $row['item_name']; ?> </td>   
                                <td> <?php echo $row['price']; ?> </td>
                                <td> <?php echo $row['description']; ?> </td>
                                <td> <?php echo $row['restaurant_name']; ?> </td>
                                <td> <img src="images/<?php echo $row['image']; ?>" height='100px' width='100px' > </td>
                                <td> <button type="button" style="background-color: #008CBA;" name="button" id="<?php echo $row["id"]; ?>"value="Order" class="btn btn-info btn-xs view_data" >Order</button></td>
                            </tr>
                            <?php
                                }
                                }else{
                                echo "No result found!!";
                                }
                        }else{
                            $query ="select * from menu_items";
                            $result = mysqli_query($conn, $query); 
                            if ( isset($result->num_rows) && $result->num_rows >0) {
                                while($row=$result->fetch_assoc()){
                            ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['food_prefer']; ?> </td>
                                <td> <?php echo $row['item_name']; ?> </td>   
                                <td> <?php echo $row['price']; ?> </td>
                                <td> <?php echo $row['description']; ?> </td>
                                <td> <?php echo $row['restaurant_name']; ?> </td>
                                <td> <img src="images/<?php echo $row['image']; ?>" height='100px' width='100px' > </td>
                                <td> <button type="button" style="background-color: #008CBA;" name="button" id="<?php echo $row["id"]; ?>"value="Order" class="btn btn-info btn-xs view_data" >Order</button></td>
                            </tr>
                            <?php
                                }
                                }else{
                                echo "No result found!!";
                                }
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>    
</body>
</html>
<div id="dataModal" class="modal fade" role="dialog">
    <div class = "modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Order Details :</h4>
            </div>
            <div class="modal-body" id="employee_detail" >
                <table>
                    <tr>
             <td> <?php echo $row['price']; ?> </td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    
    </div>
</div>

<?php

if($_SESSION['user']=="customer"){
    ?>
<script>
$(document).ready(function(){
    $('.view_data').click(function(){
        var customer_details=$(this).attr("id");
        $.ajax({
            url:"select.php",
            method:"post",
            data:{customer_details:customer_details},
            success:function(data){   
                alert("Order Placed Successfully!!");
                $('#employee_detail').html(data);
                 $('#dataModal').modal("show");
            }
        });
       
    });
});
</script>
<?php
}else{
?>
<script>
$(document).ready(function(){
    $('.view_data').click(function(){
    alert('Access denied!!');
    });
});
</script>
<?php
}
?>



