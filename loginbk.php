<?php include 'config.php'; ?>
<?php
session_start();
// Initialize the error message
$error_message = "";

// Check if form is submitted


    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM signup WHERE username = '$username'";  

    // Execute the query
    $result = $conn->query($sql);

    // Check if a user with the given username exists
    if ($result->num_rows == 1) {
        // Username exists, now check the password
        $userInfo = $result->fetch_assoc();
        $storedPassword = $userInfo['password'];

        if ($password === $storedPassword) {
            // Password is correct, set session variable to indicate login
            $_SESSION["logged_in"] = true;
            $_SESSION['id'] = $userInfo["id"];
            $_SESSION['username'] = $userInfo['username'];
            // Redirect to a protected page (e.g., home.php)
            echo "<script>window.location.href = 'home.php';</script>";
            exit();
        } else {
            // Password is incorrect, set the error message
            $error_message = "Incorrect password.";
            // Display error message in a pop-up using JavaScript
            echo "<script>alert('$error_message'); window.location.href = 'signup.php';</script>";
        }
    } else {
        // Username is incorrect, set the error message
        $error_message = "Incorrect username.";
        // Display error message in a pop-up using JavaScript
        echo "<script>alert('$error_message'); window.location.href = 'signup.php';</script>";
    }

    // Close the database connection
    $conn->close();

?>
<!-- ... your existing HTML code ... -->
