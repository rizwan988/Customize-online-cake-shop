<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Single Product</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        .order-container {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin: 20px 0;
			left:200px;
        }

        .order-message {
            margin: 0;
        }

        /* Center the entire container */
        .orders-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px; /* Add margin as needed */
        }

        
    </style>
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <?php include 'header.php'; ?>
    <!-- end header -->

    

    <!-- single product -->
    <div class="container orders-container">
        <div class="row">
            <?php
            
            $user_id = $_SESSION['id'];

            // Fetch order details from the database
            $sql = "SELECT id, user_id, image, message,payment_id FROM customer_notifications where user_id=$user_id";

            $result = $conn->query($sql);

            if ($result !== false && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Add the order-container class to each row
                    echo '<a href="display1.php?payment_id=' . urlencode($row['payment_id']) . '">';
                    echo '<div class="col-md-12 order-container d-flex justify-content-center">';
                    echo '<div class="row">';
                    
                    echo '<div class="col-md-7" style="width: 100%;">'; // Adjust the width as needed
                    echo ' <div class="single-product-content">';
                    echo ' <p class="single-product-pricing"><span></span></p>';
                    // Use the 'order-message' class for styling
                    echo '   <p class="order-message"><strong> </strong> ' . $row['message'] . '</p>';
                    echo ' <div class="single-product-form">';
                    // Add more details as needed
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                    echo '</div>'; // Close the inner row
                    echo '</div>'; // Close the order-container
                    echo '</a>';
                }
            } else {
                echo "No order found.";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <!-- end single product -->

	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
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


