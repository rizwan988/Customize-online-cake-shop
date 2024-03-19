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

	
	
<style>
      

	.centered-content {
        text-align: center;
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
	
	<?php include 'header.php'; ?>

	<!-- single product -->
	<div class="container mt-150">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>View Details</th>
                    </tr>
                </thead>
                <tbody>
				<?php
               
				$user_id = $_SESSION['id'];

                // Fetch order details from the database
                $sql = "SELECT id, user_id, image, amount, status, payment_id, delivery_date,address FROM orders WHERE user_id='$user_id' ORDER BY time DESC";

    $result = $conn->query($sql);


	if ($result->num_rows > 0) {
		$sno = 1; // Initialize serial number counter
		while ($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo '<td>' . $sno . '</td>';
			echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" style="max-width: 50px; height: auto;"></td>';
			echo '<td>Rs.' . $row['amount'] . '</td>';
			echo '<td>' . $row['status'] . '</td>';
			echo '<td><a href="#" data-toggle="modal" data-target="#orderModal' . $row['id'] . '">View Details</a></td>';
			echo '</tr>';
		
			// Add a modal for each order
			echo '<div class="modal fade" id="orderModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel' . $row['id'] . '" aria-hidden="true">';
			echo '<div class="modal-dialog" role="document">';
			echo '<div class="modal-content">';
			echo '<div class="modal-header">';
			echo '<h5 class="modal-title" id="orderModalLabel' . $row['id'] . '">Order Details</h5>';
			echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
			echo '<span aria-hidden="true">&times;</span>';
			echo '</button>';
			echo '</div>';
			echo '<div class="modal-body">';
		
			// Apply custom style for bold text
			
			echo '<div style="text-align: center;">';
			echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" style="max-width: 100%; height: auto;">';
			echo '</div>';
			echo '<p><strong>Amount:</strong> Rs.' . $row['amount'] . '</p>';
			echo '<p><strong>Payment ID:</strong> ' . $row['payment_id'] . '</p>';
			echo '<p><strong>Address:</strong> ' . $row['address'] . '</p>';
			echo '<p><strong>Delivery Time:</strong> ' . $row['delivery_date'] . '</p>';
			
			// Add more details as needed
			echo '</div>';
			echo '<div class="modal-footer">';
			echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		
			$sno++; // Increment serial number
		}
		
						
                    } else {
                        echo '<tr><td colspan="5">No orders found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
	
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