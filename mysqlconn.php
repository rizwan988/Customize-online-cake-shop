<?php
session_start();

$servername = "localhost"; // MySQL server name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "bouquet"; // MySQL database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';

$sql = "SELECT * FROM signup WHERE  username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['status'] = true;
        $_SESSION['message'] = "Login Successfully !";

        
    } else {
        $_SESSION['status'] = false;
        $_SESSION['message'] = "Login Failed !";
    }
} else {
    die("Error: " . mysqli_error($conn));
}

$jsonData = json_encode($_SESSION, JSON_PRETTY_PRINT);
echo $jsonData;

mysqli_free_result($result);
mysqli_close($conn);
?>