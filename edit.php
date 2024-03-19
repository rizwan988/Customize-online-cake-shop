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
		.breadcrumb-section {
  		padding: 0px 0;
  		background-size: cover;
  		background-position: center center;
  		position: relative;
  		z-index: 1;
  		background-attachment: fixed;
		 &:after {
  		  position: absolute;
  		  left: 0;
   		 top: 0;
   		 width: 100%;
   		 height: 90px;
   		 content: "";
   		 background-color: #07212e;
   		 z-index: -1;
   		 opacity: 0.8;
  		}

  		
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
                // Assuming you have a PHP script to fetch order details based on the order_id
                // Get order_id from the URL or session
				$id= isset($_GET['id']) ? $_GET['id'] : '';
				$_SESSION['id'] = $id;
                // Connect to your database and fetch order details
                
				

                // Fetch order details from the database
                $sql = "SELECT image,id,price,availability FROM shop_wrappers WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
    
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="Product Image"/>
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="update_product.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
                        <div class="form-group">
                        <label for="price">Product Price:</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="availability">Product Availability:</label>
                        <select class="form-control" name="availability">
                            <option value="0" <?php echo ($row['availability'] == 0) ? 'selected' : ''; ?>>Out of Stock</option>
                            <option value="1" <?php echo ($row['availability'] == 1) ? 'selected' : ''; ?>>Available</option>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    

    
        <?php
    } else {
        echo "Product not found.";
    }
    
    
    // ... (your existing code for closing database connection) ...
    
    ?>
    </body>
    </html>
    
	
	
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