<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title></title>

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
    

    <!-- latest news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="row">

                <?php
                

                $sellerQuery = "SELECT id, shopname,shop_photo, address FROM sellersignup";
                $sellerResult = $conn->query($sellerQuery);

                if ($sellerResult->num_rows > 0) {
                    while ($sellerRow = $sellerResult->fetch_assoc()) {
                        $shopname = $sellerRow['shopname'];
                        $address = $sellerRow['address'];
                        $shopPhoto = $sellerRow['shop_photo'];
                    
                        echo '<div class="col-lg-4 col-md-6">';
                        echo '<div class="single-latest-news">';
                        echo '<a href="covers.php?shopname=' . urlencode($shopname) . '">';
                        echo '<div class="latest-news-bg" style="background-image: url(\'data:image/jpeg;base64,' . base64_encode($shopPhoto) . '\');"></div>';
                        echo '</a>';
                        echo '<div class="news-text-box">';
                        echo '<h3><a href="covers.php?shopname=' . urlencode($shopname) . '">' . $shopname . '</a></h3>';
                        echo '<p class="blog-meta">';
                        echo '<span class="author"><i class="fas fa-user"></i> Admin</span>';
                        echo '<span class="date"><i class="fas fa-calendar"></i> ' . date("d F, Y") . '</span>';
                        echo '</p>';
                        echo '<p class="excerpt">' . $address . '</p>';
                        echo '<a href="covers.php?shopname=' . urlencode($shopname) . '" class="read-more-btn"> </a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No sellers found.";
                }

                $conn->close();
                ?>

            </div>

        </div>
    </div>
    <!-- end latest news -->
	
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
