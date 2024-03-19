<?php include 'config.php'; ?>
<?php

// Initialize the error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

   

    $sql = "SELECT * FROM sellersignup WHERE username = '$username'";  

    // Execute the query
    $result = $conn->query($sql);

    // Check if a user with the given username exists
    if ($result->num_rows == 1) {
        // User is authenticated, now check the password
        $userInfo = $result->fetch_assoc();
        $storedPassword = $userInfo['password'];

        if ($password === $storedPassword) {
            // Password is correct, set session variables
            $_SESSION["logged_in"] = true;
            $_SESSION['username'] = $userInfo["username"];
            $_SESSION['id'] = $userInfo["id"];
            
            // Set the shopname session variable
            $_SESSION['shopname'] = $userInfo["shopname"];
            
            // Redirect to a protected page (e.g., sell-home.php)
            echo "<script>alert('Login Successfully.'); window.location.href = 'sell-home.php';</script>";
            exit();
        } else {
            // Password is incorrect, set the error message
            $error_message = "Incorrect password.";
            // Display error message in a pop-up using JavaScript
            echo "<script>alert('$error_message'); window.location.href = 'signup1.php';</script>";
        }
    } else {
        // Username is incorrect, set the error message
        $error_message = "Incorrect username.";
        // Display error message in a pop-up using JavaScript
        echo "<script>alert('$error_message'); window.location.href = 'signup1.php';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
<!-- ... your existing HTML code ... -->
