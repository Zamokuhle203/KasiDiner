<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <link rel="stylesheet" href="index.css">
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    form {
        width: 100%;
        max-width: 800px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        color: pink;
    }

    label {
        margin-bottom: 10px;
    }

    textarea {
        resize: vertical;
        background-color: #FF69B4;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #FF69B4;
        color: white;
        padding: 8px 16px;
        /* Adjust padding for a smaller size */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #D84391;
    }
    </style>
</head>

<body>
<span class="close" id="closePopup" onclick="closeContact()">&times;</span>


    <h2>Submit a Review</h2>

    <form action="process_review.php" method="post" style="width: 1000px;">
        <style></style>
        <label for="customer_id">Customer ID:</label><br>
        <input type="text" name="customer_id" style="width: 600px;" style="height: 800px;" required><br>

        <label for="review_text">Review Text:</label><br>
        <textarea name="review_text" rows="4" cols="50" style="width: 600px;" required></textarea><br>

        <label for="review_date">Review Date:</label><br>
        <input type="datetime-local" name="review_date" style="width: 600px;" required><br>

        <input type="submit" value="Submit Review" style="width: 600px;"><br>
    </form>
    <script src="createAccountForm.js"></script>

</body>

</html>