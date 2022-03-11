<html>
<head>
    <style>
    table, th, td {
    border: 1px solid black
    }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
// Create connection
$conn = new mysqli($servername, $username);
$response = array();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo ("Connection ok". "<br>");
$query = "SELECT * FROM mytable_eat.users;";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "    <div class='container'>
                            <table class='table table-bordered table-dark table-hover table-sm'>
                            <tr>
                                <th>user_ID</th>
                                <th>username</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>phone_number</th>
                                <th>email</th>
                                <th>password</th>
                                
                            </tr>
                        ";

    while ($row = $result->fetch_assoc()) {
        echo"   <tr>
                                <td>" . $row["user_ID"] . "</td>
                                <td>" . $row["username"] . "</td>
                                <td>" . $row["first_name"] . "</td>
                                <td>" . $row["last_name"] . "</td>
                                <td>" . $row["phone_number"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["password"] . "</td>
                            </tr>";
    }
}
else {
    echo "0 results";
}
?>
