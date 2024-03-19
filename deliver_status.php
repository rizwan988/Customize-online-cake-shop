<?php include 'config.php'; ?>
<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Log received data to a file for debugging
    file_put_contents('ajax_log.txt', print_r($_POST, true) . PHP_EOL, FILE_APPEND);

    // Assuming you have a database connection established
    

    // Get id and status from the AJAX request
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update the status in the database
    $updateSql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);

    if ($stmt) {
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Order status updated successfully";
        } else {
            echo "No rows updated. Check if the order ID exists.";
        }

        $stmt->close();
    } else {
        echo "Error preparing the update statement: " . $conn->error;
    }

    $conn->close();
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method";
}
?>
