<?php
require('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<script>
    function Validate(){
        var dropdown = document.getElementById("dropdown");
        if(dropdown.value==""){
            return false;
        }
        return true;
    }
</script>
<title>Registration Form For Customers </title>
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
          <li class="active"><a href="CustomerRegisterForm.php">Register as customer</a></li>
          <li><a href="RestaurantLogin.php">Login as Restaurant</a></li>
          <li><a href="RestaurantRegisterForm.php">Register as Restaurant</a></li>
        </ul>
      </div>
    </nav>
    
    <div class='container'>
        <div class="row"> 
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="jumbotron">
                    <h4>Enter details to register yourself !</h4>
                    <form method="post" id="register" action="#">
                        <div class="form-group">
                            <label for="rname">Name</label>
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
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <select id="dropdown" name="dropdown" class="form-control" required >
                                <option value="" selected hidden>-- Food Preference --</option>
                                <option value="Veg" required>Veg</option>
                                <option value="NonVeg" required>Non Veg</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" id="sub" onclick=" Validate()" class="btn btn-primary">Submit</button><br>
                    </form>
                    <small>Already registered? </small><button class="btn btn-info" onclick="window.open('CustomerLogin.php','_self')">Login</button>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
    

<?php
if(isset($_POST['submit']) )
{
	$name = $_POST['rname'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dropdown = $_POST['dropdown'];
    $type_of_user = "customer";
	$query="INSERT INTO customer_registration(`id`, `name`, `city`, `address`, `contact_no`, `email`, `password`, `food_preference`,`user_type`) VALUES ('0','".$name."','".$city."','".$address."','".$contact."','".$email."','".$password."','".$dropdown."','".$type_of_user."')";
	$ok=mysqli_query($conn,$query);
	if($ok)
	{
		echo "<script>alert('You are registered successfully')</script>";
	}
	else
	{
		echo "<script>alert('Already registered')</script>";
	}
}

?>