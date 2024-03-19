<?php
session_start();
// Initialize the error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

	  $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    // Change DB name 
    $dbname = "bouquet"; 
	
    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * from sellersignup where username = '$username' AND password = '$password'";  

    // Execute the query
    $result = $conn->query($sql);

    // Check if a user with the given credentials exists
    if ($result->num_rows == 1) {
        // User is authenticated, set session variable to indicate login
        $_SESSION["logged_in"] = true;
        $userInfo = $result->fetch_assoc();
       
        // Redirect to a protected page (e.g., home.php)
        echo "<script>alert('Login Successfully.'); window.location.href = 'home.php';</script>";
        exit();
    } else {
        // Invalid credentials, set the error message
        
        $error_message = "Invalid username or password.";
    }

    // Close the database connection
    $conn->close();
}
?>