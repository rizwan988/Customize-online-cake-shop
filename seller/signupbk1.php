<?php
 $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "bouquet"; 
	
	$message = "Register successful";
	
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	 $Name = $_POST['username'];

     $email = $_POST['email'];

     $password = $_POST['password'];

     $confirmpassward = $_POST['confirmpassword'];


     $sql = "INSERT INTO sellersignup (username, email,password, confirmpassword) VALUES('$Name','$email','$password','$confirmpassward')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('$message');window.location.href='signup.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>