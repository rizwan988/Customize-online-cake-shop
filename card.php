<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Images</title>
    <link rel="stylesheet" href="cardstyle.css">
    <!-- Bootstrap CDN for card styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        // Database connection
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'bouquet';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to select all images from the table
        $sql = "SELECT image_data FROM download_image";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
                $image_data = $row['image_data'];

                // Generate the HTML for each image with Bootstrap card styling
                echo '<div class="col-sm-6 col-md-3">';
                echo '<div class="profile-card">';
                echo '<div class="profile-img">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="Image"/>';
                echo '</div>';
                echo '<div class="profile-content">';
                echo '<h2 class="title">Brayden';
                echo '<span>Designer & Developer</span>';
                echo '</h2>';
                echo '<ul class="social-link">';
                echo '<li><a href="#" class="fa fa-facebook"></a></li>';
                echo '<li><a href="#" class="fa fa-google"></a></li>';
                echo '<li><a href="#" class="fa fa-twitter"></a></li>';
                echo '<li><a href="#" class="fa fa-youtube"></a></li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No images found in the table.';
        }

        $conn->close();
        ?>
    </div>
</div>
</body>
</html>