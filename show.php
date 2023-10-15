<?php
// Fetch reviews from the database
require_once("config.php");

$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_NAME) or die("<p style='color:red'>Could not connect to the database!</p>");

$query_select_reviews = "SELECT customer_id, review_text, review_date FROM reviews";
$result_reviews = mysqli_query($conn, $query_select_reviews);

// Display reviews in a table
if ($result_reviews !== false && mysqli_num_rows($result_reviews) > 0) {
    echo '<span class="close" id="closePopup" onclick="closeContact()">&times;</span>';
    echo '';
    echo '<h2>Reviews</h2>';
    echo '<table border="1">';
    echo '<tr><th>Customer ID</th><th>Review Text</th><th>Review Date</th></tr>';

    while ($row = mysqli_fetch_assoc($result_reviews)) {
        echo '<tr>';
        echo '<td>' . $row['customer_id'] . '</td>';
        echo '<td>' . $row['review_text'] . '</td>';
        echo '<td>' . $row['review_date'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>No reviews available.</p>';
}

// Close the database connection
mysqli_close($conn);
?>
<!--  HTML and JavaScript code  -->
<script src="createAccountForm.js"></script>


