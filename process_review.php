<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once("config.php");

    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_NAME) or die("<p style='color:red'>Could not connect to the database!</p>");

    // Get the form data
    $customer_id = $_POST['customer_id'];
    $review_text = $_POST['review_text'];
    $review_date = $_POST['review_date'];

    // Validate the form data (you can add more validation rules)
    if (empty($customer_id) || empty($review_text) || empty($review_date)) {
        echo 'Please fill all the required fields.';
        exit;
    }

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO reviews (customer_id, review_text, review_date) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "iss", $customer_id, $review_text, $review_date);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the review is added to the database
    if ($result !== false) {
        // Success message
        echo 'Thank you for your review!';
    } else {
        // Error message
        echo 'There was an error adding your review. Please try again later.';
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    exit;
}
?>