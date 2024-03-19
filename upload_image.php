<?php include 'config.php'; ?>
<?php

$user_id = $_SESSION['id'];
// Check if a file was uploaded
if (isset($_FILES['image'])) {
    $image_data = file_get_contents($_FILES['image']['tmp_name']);
    $image_name = $_FILES['image']['name'];
    $user_id = $user_id;


    // Insert the image data into the database
    $sql = "INSERT INTO download_image (image_data, image_name, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $image_data, $image_name, $user_id);

    if ($stmt->execute()) {
        echo "Image uploaded and saved to the database successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No image file received.";
}

$conn->close();
?>