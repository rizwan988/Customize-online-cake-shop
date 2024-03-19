<?php include 'config.php'; ?>
<?php


// Database connection parameters


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id = $_POST['id'];
    $newEmail = isset($_POST['email']) ? $_POST['email'] : null;
    $newAddress = isset($_POST['address']) ? $_POST['address'] : null;
    $newPhoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : null;

    // Handle photo upload
    $newPhoto = null;
    if (isset($_FILES['shop_photo']) && $_FILES['shop_photo']['error'] === 0) {
        $allowedTypes = array('image/jpeg', 'image/png');
        if (in_array($_FILES['shop_photo']['type'], $allowedTypes)) {
            $newPhoto = file_get_contents($_FILES['shop_photo']['tmp_name']);
        } else {
            echo "Invalid file type for photo upload.";
            exit();
        }
    }

    // Build the SQL query based on provided parameters
    $query = "UPDATE sellersignup SET ";
    $params = array();

    if (!is_null($newEmail)) {
        $query .= "email = ?, ";
        $params[] = $newEmail;
    }

    if (!is_null($newAddress)) {
        $query .= "address = ?, ";
        $params[] = $newAddress;
    }

    if (!is_null($newPhoneNumber)) {
        $query .= "phone_number = ?, ";
        $params[] = $newPhoneNumber;
    }

    if (!is_null($newPhoto)) {
        $query .= "shop_photo = ?, ";
        $params[] = $newPhoto;
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
        // Redirect to the profile page
        header("Location: sell-profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request method.";
}

// Close the database connection
$conn->close();
?>
