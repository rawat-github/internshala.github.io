<!DOCTYPE html>
<html>
<head>
<title>Login Form For Restaurant </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">foodShala.com</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="CustomerLogin.php">Login as Customer</a></li>
          <li><a href="CustomerRegisterForm.php">Register as Customer</a></li>
          <li class="active"><a href="RestaurantLogin.php">Login as Restaurant</a></li>
          <li><a href="RestaurantRegisterForm.php">Register as Restaurant</a></li>
        </ul>
      </div>
    </nav>
    
    <div class='container'>
        <div class="row"> 
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="jumbotron" style="background-color: peachpuff">
                    <h4>Enter Login details for <span class="label label-danger">Restaurant</span></h4>
                    <form method="post" id="register" action="#">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" name="login" id="login" class="btn btn-danger">Login</button><br>
                    </form>
                    <small>Not having an account? </small><button class="btn btn-info" onclick="window.open('RestaurantRegisterForm.php','_self')">Register</button><br><br>
                    
                    <small>Want to login as Customer? </small><button class="btn btn-sm btn-primary" onclick="window.open('CustomerLogin.php','_self')">Click Here</button>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div> 
</body>
</html>

<?php
require('connect.php');
session_start();
if(!isset($_SESSION['email'])){
if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
//$pass = hash('sha512', $password);
$query ="select * from restaurant_registration where email='".$email."' AND password='".$password."' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if($row){
   $_SESSION['email_user']=$row['restaurant_name'];
    $_SESSION['user']=$row['user_type'];
    $_SESSION['name']=$row['owner_name'];
    header('location:dashboard.php');
    exit();
}else{
    echo "<script>alert('Invalid Credentials!!')</script>";
    exit();
}
}
}else{
    header('location:dashboard.php');
}

?>

