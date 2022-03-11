<?php

require_once "config.php";

$email = "";
$password = "";
$confirm_password = "";
$first_name = "";
$last_name = "";
$phone_number = "";
$username = "";

$email_err = "";
$password_err = "";
$confirm_password_err = "";
$first_name_err = "";
$last_name_err = "";
$phone_number_err = "";
$username_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $query_email = "SELECT user_ID FROM mytable_eat.users WHERE email = ?;";

        if ($stmt = mysqli_prepare($conn, $query_email)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $checkEmail);

            // Set parameters
            $checkEmail = trim($_POST["email"]);

            // Attempt to execute the prepared statements
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    echo("email taken ");
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate first name
    if(empty(trim($_POST["firstname"]))) {
        $first_name_err = "Please enter your first name.";
    } else {
        $first_name = trim($_POST["firstname"]);
    }

    // Validate last name
    if(empty(trim($_POST["lastname"]))) {
        $last_name_err = "Please enter your last name.";
    } else {
        $last_name = trim($_POST["lastname"]);
    }

    // Validate phone number
    if(empty(trim($_POST["phone-number"]))) {
        $phone_number_err = "Please enter your phone number.";
    } else {
        $phone_number = trim($_POST["phone-number"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $query_username = "SELECT user_ID FROM mytable_eat.users WHERE username = ?;";
        if ($stmt = mysqli_prepare($conn, $query_username)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $checkUsername);

            // Set parameters
            $checkUsername = trim($_POST["username"]);

            // Attempt to execute the prepared statements
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    $username_err = "This username is already taken. Try again.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($first_name_err) && empty($last_name_err) && empty($phone_number_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $query = "call mytable_eat.register(?, ?, ?, ?, ?, ?);";

        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $usernameInput,$first_nameInput, $last_nameInput, $phone_numberInput, $emailInput, $passwordInput);


            // Set parameters
            $usernameInput = $username;
            $first_nameInput = $first_name;
            $last_nameInput = $last_name;
            $phone_numberInput = $phone_number;
            $emailInput = $email;
            $passwordInput = $password;


            //Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo '<script language="javascript">';
                echo 'alert("User registered")';
                echo '</script>';
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //close the connection
    mysqli_close($conn);
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
    <link rel="stylesheet" href="css/register.css">

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

            session_start();

            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
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

<section>
    <div class="container d-flex align-items-left flex-column text-left">
        <div class="form">
            <h1>Sign Up</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                <div class="form-group
                    <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="">

                        <span class="help-block">
                        <?php echo $first_name_err; ?>
                    </span>
                    </fieldset>
                </div>


                <div class="form-group
                    <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="">

                        <span class="help-block">
                        <?php echo $last_name_err; ?>
                    </span>
                    </fieldset>
                </div>

                <div class="form-group
                    <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="">

                        <span class="help-block">
                        <?php echo $email_err; ?>
                    </span>
                    </fieldset>
                </div>

                <div class="form-group
                    <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>Password</label>

                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">

                        <span class="help-block">
                        <?php echo $password_err; ?>
                    </span>
                    </fieldset>
                </div>

                <div class="form-group
                    <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>Confirm Password</label>

                        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">

                        <span class="help-block">
                        <?php echo $confirm_password_err; ?>
                    </span>
                    </fieldset>
                </div>

                <div class="form-group
                    <?php echo (!empty($phone_number_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>Phone Number</label>
                        <input type="text" name="phone-number" class="form-control" value="">

                        <span class="help-block">
                        <?php echo $phone_number_err; ?>
                    </span>
                    </fieldset>
                </div>

                <div class="form-group
                    <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <fieldset class="form-group col-xs-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="">

                        <span class="help-block">
                        <?php echo $username_err; ?>
                    </span>
                    </fieldset>
                </div>

                <div class="form-group text-center">
                    <input name = "submitBtn" type ="submit" class ="btn-lg btn-primary" value = "Submit">
                    <input type="reset" class="btn-lg btn-danger" value="Clear">
                </div>

                <h3 class="text-center">Already have an account? <a href="login.php">Login here</a>.</h3>
            </form>
        </div>
    </div>
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
<script type="module" src="js/js.cookie.mjs"></script>
<script nomodule defer src="js/js.cookie.js"></script>

</body>
</html>

