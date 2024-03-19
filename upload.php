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
    <br></br>
    <br></br>
    <br></br>

    <!-- image upload form -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="upload1.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="price">Enter Price:</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
<!-- end image upload form -->
	
	
	
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
