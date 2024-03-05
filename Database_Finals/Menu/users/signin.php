<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_finals";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST["uname"];
    $password = $_POST["pass"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location:../users/domains/admin.html");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
// Close the database connection
$conn->close();
?>
