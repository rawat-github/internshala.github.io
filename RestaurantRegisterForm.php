<?php
require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Form For Restaurant </title>
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
          <li><a href="CustomerLogin.php">Login as customer</a></li>
          <li><a href="CustomerRegisterForm.php">Register as customer</a></li>
          <li><a href="RestaurantLogin.php">Login as Restaurant</a></li>
          <li class="active"><a href="RestaurantRegisterForm.php">Register as Restaurant</a></li>
        </ul>
      </div>
    </nav>
    
    <div class='container'>
        <div class="row"> 
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="jumbotron" style="background-color: peachpuff"> 
                    <h4>Enter details to register your restaurant !</h4>
                    <form method="post" id="register" action="#">
                        <div class="form-group">
                            <label for="rname">Restaurant's name</label>
                            <input type="text" name="rname" id="rname" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" required>  
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact">Contact No</label>
                            <input type="number" name="contact" id="contact" class="form-control" max=9999999999 min=0 required>
                        </div>
                        
                        <div class="form-group">
                            <label for="owner">Owner's name</label>
                            <input type="text" name="owner" id="owner" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="seat">Seats Available</label>
                            <input type="number" name="seat" id="seat" class="form-control" max=999 min=1 required>
                        </div>

                        <button type="submit" name="submit" id="sub" class="btn btn-danger">Submit</button><br>
                    </form>
                    <small>Already registered? </small><button class="btn btn-info" onclick="window.open('CustomerLogin.php','_self')">Login</button>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
    
</body>
</html>


<?php
if(isset($_POST['submit'])){
$restaurantName = $_POST['rname'];
$city = $_POST['city'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$owner_name = $_POST['owner'];
$email = $_POST['email'];
$password = $_POST['password'];
//$pass = hash('sha512', $password);
$seats_available = $_POST['seat'];
$type_of_user = "restaurant";
$query="INSERT INTO restaurant_registration(`id`, `restaurant_name`, `city`, `address`, `contact_no`, `owner_name`,`email`, `password`, `seats_available`,`user_type`) VALUES ('0','".$restaurantName."','".$city."','".$address."','".$contact."','".$owner_name."','".$email."','".$password."','".$seats_available."','".$type_of_user."')";
	$ok=mysqli_query($conn,$query);
    print_r($ok);
	if($ok)
	{
		echo "<script>alert('You are registered successfully!!')</script>";;
	}
	else
	{
		echo "<script>alert('Already registered!!')</script>";
	}
}

?>

