<?php include 'config.php'; ?>
<?php


if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Database connection parameters
    

    // Define the SQL query and prepare the statement
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        echo 'success'; // Return a success response
    } else {
        echo 'error'; // Return an error response
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
