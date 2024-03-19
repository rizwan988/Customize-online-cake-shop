<?php include 'config.php'; ?>
<?php

// Include your database connection code


// Get the status from the AJAX request
$status = $_GET['status'];

// Fetch orders based on the status
$sql = "SELECT id, user_id, image, amount, status, payment_id, time FROM orders WHERE shopname='{$_SESSION['shopname']}' AND status='$status' ORDER BY time DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Fetch the username based on user_id
        $user_id = $row['user_id'];
        $username = '';
        $address_query = "SELECT username FROM signup WHERE id = $user_id";
        $address_result = $conn->query($address_query);

        if ($address_result->num_rows > 0) {
            $address_row = $address_result->fetch_assoc();
            $username = $address_row['username'];
        }

        // Output the order container HTML
        echo '<div class="col-md-12 order-container">';
        echo '<div class="row">';
        echo '<div class="col-md-5">';
        echo '<div class="order-container">';
        echo '<div class="single-product-img">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="" />';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-md-7">';
        echo '<div class="single-product-content">';
        echo '<p class="single-product-pricing"><span></span> ' . $username . '</p>';
        echo '<p><strong>Amount: </strong> Rs.' . $row['amount'] . '</p>';
        echo '<p><strong>Payment ID: </strong>' . $row['payment_id'] . '</p>';
        echo '<p><strong>Time: </strong>' . $row['time'] . '</p>';
        echo '<p><strong>Status: </strong>' . $row['status'] . '</p>';
        echo '<div class="single-product-form">';
        // Add more details as needed
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
} else {
    echo "No order found.";
}

$conn->close();
?>
