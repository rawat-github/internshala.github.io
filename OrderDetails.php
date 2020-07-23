<?php
session_start();
?>
<html>
<head>
<title>View Orders Page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <table class="table">
                    <?php
                        require('connect.php');
                        if(isset($_SESSION['user']) && $_SESSION['user']=='restaurant'){
     
                        $query ="select * from order_details where restaurant_name='".$_SESSION['email_user']."' ";

                        $result = mysqli_query($conn, $query); 
                        if(isset($result->num_rows) && $result->num_rows>0){
                    ?>
                        <thead class="thead-dark">
                            <tr>
                                <th> Customer Name</th>  
                                <th> Restaurant Name</th>
                                <th> Food Item</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <?php
                            while($row=$result->fetch_assoc()){
                        ?>
                        <tbody>
                            <td> <?php echo $row['customer_name']; ?> </td>
                            <td> <?php echo $row['restaurant_name']; ?> </td>   
                            <td> <?php echo $row['food_item']; ?> </td>
                            <td> <?php echo $row['total_amount']; ?> </td>
                        </tbody>
                        <?php
                            }
                            }else{
                                echo "No orders found!!";
                                }
                            }else{
                                header("location:CustomerLogin.php");
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>    
</body>
</html>


