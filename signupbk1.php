<?php include 'config.php'; ?>
<?php
 

	 $Name = $_POST['username'];

     $email = $_POST['email'];

     $password = $_POST['password'];

     $confirmpassward = $_POST['confirmpassword'];

     $shopname = $_POST['shopname'];

     $address = $_POST['address'];

     $sql = "INSERT INTO sellersignup (username, email,password, confirmpassword, shopname, address) VALUES('$Name','$email','$password','$confirmpassward','$shopname','$address')";
	 

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('$message');window.location.href='signup1.php';</script>";
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>