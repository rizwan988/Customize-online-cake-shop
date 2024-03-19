<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    <title>Shop</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    
</head>
<body>
<?php include 'header.php'; ?>
    <div >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row product-lists">
            <?php
            // Retrieve shopname from the URL parameter
    $shopname = isset($_GET['shopname']) ? $_GET['shopname'] : '';
    $_SESSION['shopname'] = $shopname;
                // Database connection parameters
                $host = 'localhost'; // Change to your database host
                $username = 'root'; // Change to your database username
                $password = ''; // Change to your database password
                $database = 'cakeheaven'; // Change to your database name

                // Create a database connection
                $conn = new mysqli($host, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Sample query, replace with your actual query
                $query = "SELECT image, price, image_name, next_url, availability FROM shop_wrappers WHERE shopname = '$shopname'";
                $result = $conn->query($query);
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-md-6 text-center">';
                        echo '<div class="single-product-item">';
                        echo '<div class="product-image">';
                        // Use base64 encoded image
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="' . $row['image_name'] . '" />';
                        echo '</div>';
                        // echo '<h3>' . $row['image_name'] . '</h3>';
                        echo '<p class="product-price"><span></span> Rs.' . $row['price'] . '</p>';
                        
                        // Check availability before displaying the button
                        if ($row['availability'] == '1') {
                            echo '<a href="' . $row['next_url'] . '" class="cart-btn"> Customize</a>';
                        } else {
                            echo '<p style="color: red;">Out of Stock</p>';
                        }
            echo '</div>';
            echo '</div>';
        }
                    } else {
                        echo "No products found.";
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </div>
            
        </div>
    </div>
    <!-- end products -->

	
	
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>