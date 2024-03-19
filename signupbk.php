<?php include 'config.php'; ?>
<?php


$Name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Check if email is in the correct format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script type='text/javascript'>alert('Invalid email format. Please enter a valid email.');window.location.href='signup.php';</script>";
    exit;
}

$sql = "INSERT INTO signup (username, email, password, confirmpassword) VALUES('$Name','$email','$password','$confirmpassword')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('$message');window.location.href='signup.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
