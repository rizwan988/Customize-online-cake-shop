<?php include 'config.php'; ?>
<?php


// Database connection parameters


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id = $_POST['id'];
    $newPrice = isset($_POST['price']) ? $_POST['price'] : null;
    $newAvailability = isset($_POST['availability']) ? $_POST['availability'] : null;

    // Build the SQL query based on provided parameters
    $query = "UPDATE shop_wrappers SET ";
    $params = array();

    if (!is_null($newPrice)) {
        $query .= "price = ?, ";
        $params[] = $newPrice;
    }

    if (!is_null($newAvailability)) {
        $query .= "availability = ?, ";
        $params[] = $newAvailability;
    }

    // Remove the trailing comma and space
    $query = rtrim($query, ", ");

    // Add the WHERE clause
    $query .= " WHERE id = ?";
    $params[] = $id;

    // Prepare and execute the SQL query
    $stmt = $conn->prepare($query);

    // Dynamically bind parameters
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        // Redirect to edit.php
        header("Location: edit.php?id=$id");
        exit();
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
