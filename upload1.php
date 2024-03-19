<?php include 'config.php'; ?>
<?php


// Database connection


// Check if the directory to save uploaded files exists, and create it if it doesn't
$uploadDirectory = __DIR__ . '/uploads/';
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

// Retrieve the username from the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Initialize shopname variable
$shopname = '';

if (!empty($username)) {
    // Query to retrieve the shopname based on the username
    $shopnamesQuery = "SELECT shopname FROM sellersignup WHERE username = ?";
    $stmt_shopname = $conn->prepare($shopnamesQuery);
    $stmt_shopname->bind_param('s', $username);

    if ($stmt_shopname->execute()) {
        $stmt_shopname->bind_result($retrievedShopname);

        // Fetch the shopname result
        if ($stmt_shopname->fetch()) {
            $shopname = $retrievedShopname;
        } else {
            echo "Shop name not found for the logged-in user.";
        }
    } else {
        echo "Error fetching shop name: " . $stmt_shopname->error;
    }

    $stmt_shopname->close();
}

// File upload handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_name = $_FILES['image']['name'];
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $price = isset($_POST['price']) ? $_POST['price'] : null;

    // Insert image, shopname, and price into the database
    $sql = "INSERT INTO shop_wrappers (shopname, image_name, image, price) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssd', $shopname, $image_name, $image, $price);

    if ($stmt->execute()) {
        // Move the uploaded file to the specified directory
        $uploadedFilePath = $uploadDirectory . $image_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath);

        echo "Image uploaded successfully.";
    } else {
        echo "Error inserting image: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
