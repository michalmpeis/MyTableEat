<?php
session_start();


require_once "config.php";

// Define variables and initialize with empty values
$email = "";
$password = "";

$email_err = "";
$password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        $email_check = "SELECT user_ID, username, first_name, last_name, email FROM mytable_eat.users WHERE email = ?";
        $login_query = "call mytable_eat.login(?, ?)";

        // Checks if the email is valid
        if ($stmt = mysqli_prepare($conn, $email_check)) {
            mysqli_stmt_bind_param($stmt, "s", $email);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    mysqli_stmt_bind_result($stmt, $user_ID, $username, $first_name, $last_name, $email);

                    if (mysqli_stmt_fetch($stmt)){
                        if ($stmt = mysqli_prepare($conn, $login_query)) {
                            mysqli_stmt_bind_param($stmt, "ss", $email, $password);

                            if (mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_store_result($stmt);

                                if (mysqli_stmt_num_rows($stmt) > 0) {
                                    session_start();

                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["user_ID"] = $user_ID;
                                    $_SESSION["username"] = $username;
                                    $_SESSION["first_name"] = $first_name;
                                    $_SESSION["last_name"] = $last_name;
                                    $_SESSION["email"] = $email;

                                    // Redirect user to welcome page
                                    header("location: index.php");

                                }else {
                                    $password_err = "The password you entered was not valid.";
                                }
                            }
                        }
                    }
                }
            } else{
                $email_err = "No account found with that email.";
            }
        } else{
            echo "Something went wrong. Please try again later.";
        }
        mysqli_close($conn);
    }
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
    <link rel="stylesheet" href="css/login.css">

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

            <ul class="nav navbar-nav navbar-right">
                <a class="section-btn" href="login.php">Login</a>
                <a class="section-btn" href="register.php">Sign up</a>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="container d-flex align-items-center flex-column text-center">
        <div class="form">
            <h1>Login</h1>

            <p>Please fill in your credentials to login.</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group
                            <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">

                    <span class="help-block">
                                <?php echo $email_err; ?>
                            </span>
                </div>

                <div class="form-group
                            <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">

                    <span class="help-block">
                                <?php echo $password_err; ?>
                            </span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>

                <p>
                    Don't have an account? <a href="register.php">Sign up now</a>.
                </p>
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

</body>
</html>

