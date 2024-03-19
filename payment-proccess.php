<?php include 'config.php'; ?>
<?php

$user_id = $_SESSION['id'];
$shop = $_SESSION['shopname'];

// Retrieve the last added image from the "download_image" table
$image_sql = "SELECT image_data, image_name FROM download_image ORDER BY id DESC LIMIT 1";
$image_result = $conn->query($image_sql);

if ($image_result->num_rows > 0) {
    $image_row = $image_result->fetch_assoc();
    $image_data = $image_row["image_data"];
    $image_name = $image_row["image_name"];

    $data = [
        'user_id' => $user_id,
        'payment_id' => $_POST['razorpay_payment_id'],
        'amount' => $_POST['totalAmount'],
        'product_id' => $_POST['product_id'],
        'address' => $_POST['address'],
        'date' => $_POST['date'],
    ];

    // Define the SQL query to insert data into the orders table including the retrieved image data
    $sql = "INSERT INTO orders (user_id, payment_id, amount, product_id, image, image_name, shopname, address, delivery_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("ississsss", $data['user_id'], $data['payment_id'], $data['amount'], $data['product_id'], $image_data, $image_name, $shop, $data['address'], $data['date']);

    if ($stmt->execute()) {
        // Store a notification in the customer-notification database
       // Store a notification in the customer-notification database
$user_notification = "Your Order is successfully placed with amount: Rs" . $data['amount'];
saveCustomerNotification($user_id, $_POST['razorpay_payment_id'], $user_notification, $image_data);

        // Save a notification to the seller
        $seller_notification = "You have a new order of amount: Rs" . $data['amount'];
        saveSellerNotification($shop, $_POST['razorpay_payment_id'], $seller_notification, $image_data);

        $arr = array('msg' => 'Payment successfully credited', 'status' => true);
        echo json_encode($arr);
    } else {
        $arr = array('msg' => 'Error: Unable to insert data into the database', 'status' => false);
        echo json_encode($arr);
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error: Unable to retrieve the last added image.";
}

// Close the database connection
$conn->close();
// Function to save notifications in the database
function saveCustomerNotification($user_id, $payment_id, $message, $image_data) {
    global $conn;
    $sql = "INSERT INTO customer_notifications (user_id, payment_id, message, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user_id, $payment_id, $message, $image_data);
    $stmt->execute();
    $stmt->close();
}

// Function to save notifications in the seller-notification database
function saveSellerNotification($shop, $payment_id,$message, $image_data) {
    global $conn;
    $sql = "INSERT INTO seller_notifications (shopname, payment_id, message, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $shop, $payment_id, $message, $image_data);
    $stmt->execute();
    $stmt->close();
}
?>