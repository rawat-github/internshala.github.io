<?php
 session_start();
if(!isset($_SESSION['name'])){
    header("location:RestaurantLogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>dashboard </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
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
    
    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron">
                <?php
                if(isset($_SESSION['name'])){ ?>
                <h2 class="text-center text-success">Hello ! <?php echo $_SESSION['name'];?></h2>
                <?php
                }   ?>
            <h1 align="center">Welcome to FoodShala.com </h1>
            </div>          
        </div>
        <?php
        if(isset($_SESSION['user']) && $_SESSION['user']=="restaurant"){
        ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3" style="background-color: peachpuff;">
                <a href="Menu.php" style="text-decoration: none;font-size: 25px;color: darkred"><div class="button">Food Menu</div></a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3" style="background-color: peachpuff;">
                <a href="MenuItem.php" style="text-decoration: none;font-size: 25px;color: darkred"><div class="button">Add Menu Items</div></a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3" style="background-color: peachpuff">
                <a href="OrderDetails.php" style="text-decoration: none;font-size: 25px;color: darkred"><div class="button">View Order Details</div></a>
            </div>
            <div class="col-md-1"></div>
        </div>
        <?php
        }else{
        ?>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-3" style="background-color: peachpuff;">
                    <a href="Menu.php" style="text-decoration: none;font-size: 50px;color: darkred"><div class="button">Food Menu</div></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    </body>
</html>
