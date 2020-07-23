<?php
session_start();
require('connect.php');
 if(isset($_SESSION['user']) && $_SESSION['user']=='restaurant'){
     
 }else{
     header("location:CustomerLogin.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>menu item page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>   </head>
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
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="jumbotron">
                    <h4>Add menu items for your restaurant</h4>
                    <form method="post" id="register" action="#">
                        <div class="form-group">
                            <label>Select your food preference:</label><br>
                              <input type="radio" id="food" name="food" value="Veg" required>
                              <label for="veg">Veg</label>
                              <input type="radio" id="food" name="food" value="NonVeg" required>
                              <label for="nonveg">Non Veg</label>
                        </div>

                        <div class="form-group">
                            <label for="item">Food Item</label>
                            <input type="text" name="item" id="item" class="form-control" required> 
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price (in Rs)</label>
                            <input type="number" name="price" id="price" class="form-control" min=1 required>
                        </div>
                        
                        <div class="form-group">
                            <label for="desc">Item Description</label>
                            <textarea name="desc" id="desc" class="form-control" style="height : 50px" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Select image to upload <small>(Optional)</small></label>
                            <input type="file" name="image" id="image">
                        </div>

                        <button type="submit" name="sub" id="sub" class="btn btn-primary">Add</button><br>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['sub'])){
$food_prefer = $_POST['food'];
$food_item = $_POST['item'];
$image = $_POST['image'];
$price = $_POST['price'];
$description = $_POST['desc'];
$query = "INSERT INTO menu_items(`id`, `food_prefer`, `item_name`, `image`, `price`, `description`,`restaurant_name`) VALUES ('0','".$food_prefer."','".$food_item."','".$image."','".$price."','".$description."','". $_SESSION['email_user']."')";
$ok=mysqli_query($conn,$query);
	if($ok)
	{
		echo "<script>alert('Added item successfully')</script>";
	}
	else
	{
		echo "<script>alert('Already added item in the menu page!!')</script>";
	}
}

?>