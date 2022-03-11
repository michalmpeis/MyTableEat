<?php
// Initialize the session
session_start();

require_once "config.php";


$user_ID = "";
$alcohol_free = "";
$gluten_free = "";
$halal = "";
$kosher = "";
$vegan = "";
$lactose_free = "";
$vegetarian = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['SubmitButton'])) {
        $_POST['alcohol'] = $_POST['alcohol'] == 'true';
    }
    else $_POST['alcohol'] = FALSE;

    if(isset($_POST['SubmitButton'])) {
        $_POST['gluten'] = $_POST['gluten'] == 'true';
    }
    else $_POST['gluten'] = FALSE;

    if(isset($_POST['SubmitButton'])) {
        $_POST['halal'] = $_POST['halal'] == 'true';
    }
    else $_POST['halal'] = FALSE;

    if(isset($_POST['SubmitButton'])) {
        $_POST['kosher'] = $_POST['kosher'] == 'true';
    }
    else $_POST['kosher'] = FALSE;

    if(isset($_POST['SubmitButton'])) {
        $_POST['vegan'] = $_POST['vegan'] == 'true';
    }
    else $_POST['vegan'] = FALSE;

    if(isset($_POST['SubmitButton'])) {
        $_POST['lactose'] = $_POST['lactose'] == 'true';
    }
    else $_POST['lactose'] = FALSE;

    if(isset($_POST['SubmitButton'])) {
        $_POST['vegetarian'] = $_POST['vegetarian'] == 'true';
    }
    else $_POST['vegetarian'] = FALSE;

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/MAIN.css">

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
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
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


<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="row">
        <?php
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            echo'<div class="owl-carousel owl-theme">
    <div class="item item-first">
        <div class="caption">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3>Make a reservation with any store fast and securely</h3>
                    <h1>Find stores that fit your needs
                        based on your preferences!</h1>
                    <a href="stores.php" class="section-btn btn btn-default smoothScroll">See stores</a>
                </div>
            </div>
        </div>
    </div>

    <div class="item item-second">
        <div class="caption">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3>Alter Booking?</h3>
                    <h1>Want to alter a booking? Login to see your bookings page!</h1>
                    <a href="bookings.php" class="section-btn btn btn-default smoothScroll">See my bookings</a>
                </div>
            </div>
        </div>
    </div>
    <div class="item item-third">
        <div class="caption">
            <div class="container">
                <div class="col-md-8 col-sm-12">
                    <h3>Want to book for many people?</h3>
                    <h1>Add your friends!</h1>
                    <a href="friends.php" class="section-btn btn btn-default smoothScroll">See my friends</a>
                </div>
            </div>
        </div>
    </div>
</div>';
        }
        else{
            echo '<div class="item item-first">
            <div class="caption">
                <div class="container">
                    <div class="col-md-4 col-sm-12">' .
                        '<h1>Welcome ' . $_SESSION["first_name"] . '</h1>' .
                        '<h3>Looking to book a store?</h3>' .
                        '<a href="stores.php" class="section-btn btn btn-default smoothScroll">See stores</a>
                    </div>
                </div>
            </div>
        </div>';
        }
        ?>
    </div>
</section>

<!-- FOOTER -->
<footer id="footer" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-8">
                <div class="footer-info">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Our headquarters</h2>
                    </div>
                    <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>Alexandrou Zaimi 48,<br> Piraeus, Attica 18539<br>Greece</p>
                    </address>
                </div>
            </div>

            <div class="col-md-3 col-sm-8">
                <div class="footer-info">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Contact Information</h2>
                    </div>
                    <address class="wow fadeInUp" data-wow-delay="0.4s">
                        <p>+306986663982 | +4407473965314</p>
                        <p><a href="mailto:amichalmpeis@gmail.com">amichalmpeis@gmail.com</a></p>
                    </address>
                </div>
            </div>

            <div class="col-md-4 col-sm-8">
                <div class="footer-info footer-open-hour">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s">Customer Support</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <strong>Monday to Friday</strong>
                        <p>9:00 AM - 9:00 PM</p>
                        <div>
                            <strong>Saturday - Sunday</strong>
                            <p>9:00 AM - 2:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-sm-4">
                <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                    <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                    <li><a href="#" class="fa fa-google"></a></li>
                </ul>

                <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
                    <p><br>Copyright &copy; 2022 <br>My Table Eat

                        <br><br>Owner: Alexandros Michalmpeis</p>
                </div>
            </div>

        </div>
    </div>
</footer>


<div class="modal fade" id="DietaryPreferences" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-color text-center">
                <h4 class="modal-title w-100 font-weight-bold">Welcome to MyTableEat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <h5 class="modal-color">Please let us know if you have any dietary preferences from the list below. </h5>
                    <h5 class="modal-color">This way we can improve suggestions of stores you may like.</h5>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Alcohol Free" name="alcohol">
                    <label for="Alcohol Free" class="modal-color">Alcohol Free</label>
                </div>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Gluten Free" name="gluten">
                    <label for="Gluten Free" class="modal-color">Gluten Free</label>
                </div>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Halal" name="halal">
                    <label for="Halal" class="modal-color">Halal</label>
                </div>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Kosher" name="kosher">
                    <label for="Kosher" class="modal-color">Kosher</label>
                </div>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Vegan" name="vegan">
                    <label for="Vegan" class="modal-color">Vegan</label>
                </div>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Lactose Free" name="lactose">
                    <label for="Lactose Free" class="modal-color">Lactose Free</label>
                </div>
                    <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="checkbox" id="Vegetarian" name="vegetarian">
                    <label for="Vegetarian" class="modal-color">Vegetarian</label>
                </div>
                </span>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input name = "submitBtn" type ="submit" class ="btn btn-primary" value = "Submit">
                <button class="btn btn-danger" data-dismiss="modal">No thank you</button>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
<script type="module" src="js/js.cookie.mjs"></script>
<script nomodule defer src="js/js.cookie.js"></script>

<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    echo "<script>
    $(document).ready(function() {
        if (document.cookie.indexOf('FooBar=true') === -1) {
            document.cookie = 'FooBar=true; max-age=86400'; // 86400: seconds in a day
            $('#DietaryPreferences').modal('show');
        }
    });
</script>";
}
?>

</body>
</html>
