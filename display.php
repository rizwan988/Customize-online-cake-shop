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
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
$(document).ready(function() {
    // Handle the click event on the Deliver button
    $('#deliverButton').on('click', function(e) {
        e.preventDefault();

        // Get the order ID from the session
        var orderId = <?php echo json_encode($_SESSION['id']); ?>;

        // Make an AJAX request to update the status
        $.ajax({
            type: 'POST',
            url: 'deliver_status.php', // Replace with the actual PHP script to update the status
            data: { orderId: orderId, status: 'delivered' },
            success: function(response) {
                // Handle the response from the server if needed
                console.log(response);

                // For demonstration purposes, you can reload the page after successful delivery
                // You might want to show a success message or update the UI instead
                location.reload();
            },
            error: function(error) {
                // Handle errors if the request fails
                console.error(error);
            }
        });
    });
});
</script>




</head>

<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<?php include 'header1.php'; ?>

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <?php
                // Assuming you have a PHP script to fetch order details based on the order_id
                // Get order_id from the URL or session
				$payment_id= isset($_GET['payment_id']) ? $_GET['payment_id'] : '';
				$_SESSION['payment_id'] = $payment_id;
                // Connect to your database and fetch order details
                

                // Fetch order details from the database
                $sql = "SELECT id, user_id, image, amount, status, payment_id, time FROM orders WHERE payment_id = '$payment_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo '<div class="col-md-5">';
			echo '<div class="order-container">';
			echo '<div class="single-product-img">';
			echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="col-md-7">';
			echo '<div class="single-product-content">';
			echo '<p class="single-product-pricing"><span></span> </p>';
			echo '<p><strong>Amount: </strong> Rs.' . $row['amount'] . '</p>';
			echo '<p><strong>Payment ID: </strong>' . $row['payment_id'] . '</p>';
			echo '<p><strong>Time: </strong>' . $row['time'] . '</p>';
			echo '<p><strong>Status: </strong>' . $row['status'] . '</p>';
			echo '<div class="single-product-form">';
			// Add more details as needed
			echo '</div>';
			echo '</div>';
			echo '</div>';
		} }else {
        echo "No order found.";
    }

    $conn->close();
?>
                
            </div>
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