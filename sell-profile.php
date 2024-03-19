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
<style>
      .order-container {
        display: flex;
        align-items: center; /* Center items vertically */
        margin-bottom: 20px; /* Adjust margin as needed */
        border: 1px solid #ddd; /* Optional: Add border for a visual separation */
		
        border-radius: 10px; /* Optional: Add border-radius for rounded corners */
        padding: 10px; /* Optional: Add padding for spacing */
    }

    .order-message {
        margin: 0; /* Reset margin for the message */
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
	
	
	<?php include 'header1.php'; ?>

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
			<?php
                // Assuming you have a PHP script to fetch seller details based on the seller_id
                // Get seller_id from the URL or session
                $id = $_SESSION['id'];
                // Connect to your database and fetch seller details
                

                // Fetch seller details from the database
                $sql = "SELECT username, email, address, shop_photo, phone_number, id FROM sellersignup WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                ?>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="single-product-img">
                                    <img src="data:photo/jpeg;base64,<?php echo base64_encode($row['shop_photo']); ?>" alt="Shop Photo"/>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form action="sell-update_profile.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    
                                    <!-- Display username (non-editable) -->
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="<?php echo $row['phone_number']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="shop_photo"></label>
                                        <input type="file" name="shop_photo">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    echo "Seller not found.";
                }

                // Close the database connection
                $conn->close();
                ?>
    </body>
    </html>
    
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