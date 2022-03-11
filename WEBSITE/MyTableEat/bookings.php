<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>MyTableEat | Venue Booking</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/booking-form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bookings.css">
    <link rel="stylesheet" href="css/maps.css">

</head>
<body>


<section class="preloader">
    <div class="spinner">

        <span class="spinner-rotate"></span>

    </div>
</section>



<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <a href="index.php" class="navbar-brand">My <span></span> Table <span></span> Eat</a>
        </div>


        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-nav-first">
                <li><a href="index.php" class="smoothScroll">Home</a></li>
                <li><a href="stores.php" class="smoothScroll">Stores</a></li>
                <li><a href="bookings.php" class="smoothScroll">Bookings</a></li>
                <li><a href="account.php" class="smoothScroll">Account</a></li>
                <li><a href="contact.php" class="smoothScroll">Contact</a></li>
            </ul>
            <?php
            if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
                echo '<ul class="nav navbar-nav navbar-right">
                <a class="section-btn" href="account.php">My Account</a>
                <a class="section-btn" href="logout.php">Logout</a>
            </ul>';
            }
            else{
                echo '<ul class="nav navbar-nav navbar-right">
                <a class="section-btn" href="login.php">Login</a>
                <a class="section-btn" href="register.php">Sign up</a>
            </ul>';
            }
            ?>
        </div>
    </div>
</section>

<section>
    <div class="container d-flex align-items-left flex-column text-left">
        <div class="form">
            <h1>My Bookings</h1>
        </div>
    </div>
</section>


<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/booking-form.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>




</body>
</html>

