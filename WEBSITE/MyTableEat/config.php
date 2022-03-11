<?php
//Set up
$server = "localhost";
$server_username = "root";

$conn = mysqli_connect($server, $server_username);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
