<!--========= GOGWANA SINENAJBULO, ZAMOKUHLE NKUMAN
	Everything about the createaccount form is in here including its html
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="signin.php">
    <title>Create Account</title>
</head>
<body>

<!--========================== PHP SECTION ========================-->
<?php

require_once("config.php");
error_reporting(E_ALL);

// Create a connection
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_NAME);

// Variables for form fields and error messages
$pass = $name = $nameErr = $email = $emailErr = $cellno = $cellnoErr = $address = $addressErr = $password = $confirmpassword = $passErr = $passwordErr = "";
$success = false;
$emailExistsError = false;

// Check for required fields and validate email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            // Check if the email already exists in the database
            $query = "SELECT * FROM customers WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $emailExistsError = true; // Set the flag if the email already exists
            }
        }
    }

    if (empty($_POST["cellno"])) {
        $cellnoErr = "Cellphone number required";
    } else {
        $cellno = test_input($_POST["cellno"]);
        if (strlen($cellno) != 10 || !ctype_digit($cellno)) {
            $cellnoErr = "Invalid cellphone number";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST['address']);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{7}$/";
        // Validate password length (e.g., it must be 7 characters)
        if (strlen($password) != 7 && preg_match_all($pattern, $password)) {
                $passwordErr = "Invalid Password ";
            }
        
        // Match passwords
        if (!($password == $_POST["confirmPassword"])) {
            $passErr = "Passwords do not match";
        }
    }

    // If there are no validation errors and email doesn't exist, set $success to true
    if (empty($nameErr) && empty($emailErr) && empty($cellnoErr) && empty($addressErr) && empty($passwordErr) && empty($passErr) && !$emailExistsError) {
        $success = true;

        // Insert user data into the database
        $user_id = 1; // Assuming user_id should auto-increment
		
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		//inserting data into the customer table
        $insertQuery = "INSERT INTO customers (user_id, full_name, email, address, phone_number, password) VALUES (?, ?, ?, ?, ?, ?)";
		
		//inserting data into the user table
		/*	$roles = array("customer","admin" )
			$insertQuery = "INSERT INTO users (user_id, roles) VALUES (?, ?)";

		*/
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $user_id, $name, $email, $address, $cellno, $hashedPassword);
        $stmt->execute();
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<section id="popup">
    <span class="close" id="closePopup" onclick="closeForm()">&times;</span>
    <h1 class="heading">Create An Account</h1>
    <div class="row">
        <form method="post" action="createAccountForm.php" name="orderform" onsubmit="return formValCreate()">
            <label for="name">Name:</label>
            <div class="inputBox">
                <input name="name" type="text" id="name" name="name"> 
                <span class="error">* <?php echo $nameErr; ?> </span>
            </div>

            <label for="name">Email:</label>
            <div class="inputBox">
                <input type="email" id="email" name="email">
                <span class="error">* <?php echo $emailErr; ?> </span>
                <?php if ($emailExistsError) { ?>
                    <span class="error">* Email already exists. Please use a different email.</span>
                <?php } ?>
            </div>

            <label for="cellno">Cellphone Number:</label>
            <div class="inputBox">
                <input type="number" id="cellno" name="cellno">
                <span class="error">* <?php echo $cellnoErr; ?> </span>
            </div>

            <label for="address">Address:</label>
            <div class="inputBox">
                <textarea type="text" id="address" name="address"></textarea>
                <span class="error">* <?php echo $addressErr; ?> </span>
            </div>

            <label for="password">Password:</label>
            <div class="inputBox">
                <p style="font-size:16px"> Create a strong password with a mixture of letters, numbers, and symbols.</p>
                <input type="password" id="createpassword" name="password">
                <span class="error">* <?php echo $passwordErr; ?> </span>
            </div>

            <label for="confirmPassword">Confirm Password:</label>
            <div class="inputBox">
                <input type="password" id="confirmPassword" name="confirmPassword">
                <span class="error">* <?php echo $passErr; ?> </span>
            </div>

            <!-- The Submit button and Signin link are conditional -->
            <?php if (!$success) { ?>
                <input name="submit" type="submit" value="Submit" id="createbutton">
            <?php } ?>
            <?php if ($success) { ?>
                <p style="font-size:24px; color:green;">Account created successfully.</p>
                <p>Now go to <a href="signin.php">Signin</a></p>
            <?php } ?>
        </form>
    </div>
</section>
<script src="createAccountForm.js"></script>
</body>
</html>
