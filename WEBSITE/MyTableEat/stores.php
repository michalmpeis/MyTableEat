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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stores.css">

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
                <li><a href="account.php" class="smoothScr oll">Account</a></li>
                <li><a href="contact.php" class="smoothScroll">Contact</a></li>
            </ul>
            <?php
            if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
                echo '<ul class="nav navbar-nav navbar-right">
                <a class="section-btn" href="register.php">My Account</a>
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



<section class="left">
    <div class="filters">
        <h2 class="cuisines">Cuisines</h2>
        <div>
            <input type="radio" name="filters" onclick="filterSelection('coffee')" checked>
            <label class="cuisines">
                Coffee
            </label>
        </div>
        <div>
            <input type="radio" name="filters" onclick="filterSelection('pizza')">
            <label class="cuisines">
                Pizza
            </label>
        </div>
        <div>
            <input type="radio" name="filters" onclick="filterSelection('chinese')">
            <label class="cuisines">
                Chinese
            </label>
        </div>

        <div>
            <input type="radio" name="filters" onclick="filterSelection('burgers')">
            <label class="cuisines">
                Burgers
            </label>
        </div>

        <div>
            <input type="radio" name="filters" onclick="filterSelection('sushi')">
            <label class="cuisines">
                Sushi
            </label>
        </div>

        <div>
            <input type="radio" name="filters" onclick="filterSelection('ice_cream')">
            <label class="cuisines">
                Ice cream
            </label>
        </div>

        <div>
            <input type="radio" name="filters" onclick="filterSelection('waffles')">
            <label class="cuisines">
                Waffles
            </label>
        </div>
        <div>
            <input type="radio" name="filters" onclick="filterSelection('crepes')">
            <label class="cuisines">
                Crepes
            </label>
        </div>
        <div>
            <input type="radio" name="filters" onclick="filterSelection('indian')">
            <label class="cuisines">
                Indian
            </label>
        </div>
        <div>
            <input type="radio" name="filters" onclick="filterSelection('seafood')">
            <label class="cuisines">
                Seafood
            </label>
        </div>
    </div>
</section>

<section>
    <div class="stores_box">
        <h2 class="stores">Stores</h2>
        <div class="container">
            <div class="filterDiv coffee">
                <h2 class="text-nowrap">Coffee Shops</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Caffeine Club</p>
                            <div>
                                <img src="images/stores/CAFFEINE_CLUB.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">46 Tavistock Pl, Plymouth PL4 8AX</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv pizza">
                <h2 class="text-nowrap">Pizza Restaurants</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Domino's Pizza - Plymouth - City Centre</p>
                            <div>
                                <img src="images/stores/dominos.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">65-67 Exeter St, Plymouth PL4 0AH</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv chinese">
                <h2 class="text-nowrap">Chinese Restaurants</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">The Red Lantern</p>
                            <div>
                                <img src="images/stores/The_Red_Lantern.jpeg" class="store-img">
                            </div>
                            <p class="store-sub-title">57 North Hill, Plymouth PL4 8HB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv burgers">
                <h2 class="text-nowrap">Burger Houses</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Five Guys</p>
                            <div>
                                <img src="images/stores/Five_Guys.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">Unit 9, The Barcode, Plymouth PL1 0FE</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv sushi">
                <h2 class="text-nowrap">Sushi Restaurants</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Oishi Sushi</p>
                            <div>
                                <img src="images/stores/Oishi_Sushi.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">49 Mayflower St, Plymouth PL1 1QL</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv ice_cream">
                <h2 class="text-nowrap">Ice cream shops</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Sundaes Gelato</p>
                            <div>
                                <img src="images/stores/Sundaes_Gelato.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">80 Royal Parade, Plymouth PL1 1DZ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv waffles">
                <h2 class="text-nowrap">Waffle shops</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Kawaffle Bubble Waffles</p>
                            <div>
                                <img src="images/stores/Kawaffle_Bubble_Waffles.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">46 Tavistock Pl, Plymouth PL4 8AX</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv crepes">
                <h2 class="text-nowrap">Crepe shops</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Crispys</p>
                            <div>
                                <img src="images/stores/Crispys.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">134 Armada Way, Plymouth PL1 1LA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv indian">
                <h2 class="text-nowrap">Indian Restaurants</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">Everest Spice</p>
                            <div>
                                <img src="images/stores/Everest_Spice.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">Hoe Park, 14 Athenaeum St, Plymouth PL1 2RH</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filterDiv seafood">
                <h2 class="text-nowrap">Seafood Restaurants</h2>
                <div id="store-layout">
                    <div class="stores-container">
                        <div class="store-content">
                            <p class="store-title">The Village Restaurant</p>
                            <div>
                                <img src="images/stores/The_Village_Restaurant.jpg" class="store-img">
                            </div>
                            <p class="store-sub-title">32 Southside St, Plymouth PL1 2LE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>








<!-- MENU-->
<section id="menu" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h1>Popular Categories</h1>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <div class="menu-item">
                        <h3>Coffee Shops</h3>
                    </div>
                    <a href="images/COFFEE.jpg" class="image-popup" title="coffee">
                        <img src="images/COFFEE.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <div class="menu-item">
                        <h3>Chinese Restaurants</h3>
                    </div>
                    <a href="images/CHINESE.jpg" class="image-popup" title="chinese">
                        <img src="images/CHINESE.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <div class="menu-item">
                        <h3>Burger Houses</h3>
                    </div>
                    <a href="images/BURGER.jpg" class="image-popup" title="Burger">
                        <img src="images/BURGER.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <div class="menu-item">
                        <h3>Pizza Restaurants</h3>
                    </div>
                    <a href="images/PIZZA.jpg" class="image-popup" title="Pizza">
                        <img src="images/PIZZA.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <div class="menu-item">
                        <h3>Italian Pasta Restaurants</h3>
                    </div>
                    <a href="images/PASTA.jpg" class="image-popup" title="Project title">
                        <img src="images/PASTA.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- MENU THUMB -->
                <div class="menu-thumb">
                    <div class="menu-item">
                        <h3>Mediterranean Restaurants</h3>
                    </div>
                    <a href="images/GREEK.jpg" class="image-popup" title="Project title">
                        <img src="images/GREEK.jpg" class="img-responsive" alt="">

                        <div class="menu-info">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <h3>Looking more specifically? Click here!</h3>
</section>


<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
<script src="js/filterSystem.js"></script>
<script type="module" src="js/js.cookie.mjs"></script>
<script nomodule defer src="js/js.cookie.js"></script>
</body>
</html>
