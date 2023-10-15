<?php
// Ensure that you have a database connection
require('config.php'); // Replace with your actual database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order details sent from the client
    $orderDetails = json_decode($_POST['orderDetails'], true); // Assuming it's a JSON string

    // Get the user's email address from the session or wherever you store it
    $userEmail = $_SESSION['user_email']; // Replace with your actual session handling

    // Insert order details into the 'orders' table in your database
    foreach ($orderDetails as $item) {
        $itemName = $item['name'];
        $itemQuantity = $item['quantity'];
        $itemTotal = $item['total'];

        $insertQuery = "INSERT INTO orders (user_email, item_name, item_quantity, item_total) 
                        VALUES ('$userEmail', '$itemName', $itemQuantity, $itemTotal)";

        // Execute the SQL query to insert the order item
        if (mysqli_query($connection, $insertQuery)) {
            // Order item inserted successfully
        } else {
            // Handle any errors that may occur during insertion
            echo "Error: " . mysqli_error($connection);
        }
    }
}

// Close the database connection
mysqli_close($connection);

// You can send a response back to the client to confirm the order submission
echo 'Order submitted successfully';
?>
