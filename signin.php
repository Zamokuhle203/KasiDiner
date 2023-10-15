<?php

require_once('config.php');
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_NAME);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected";
// Variables for form fields and error messages
$emailErr = $passwordErr = "";


session_start();

if (isset($_POST['submit'])) {
echo "inside";
   $name = mysqli_real_escape_string($conn, test_input($_POST['email']));
   $entered_pass = $_POST['password'];

   $select_admin = $conn->prepare("SELECT * FROM customers WHERE email = ?");
   $select_admin->bind_param("s", $name);
   $select_admin->execute();

   if ($select_admin->errno) {
      die('Error executing query: ' . $select_admin->error);
   }

   $result = $select_admin->get_result(); // Assign $result here

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $stored_password = $row['password']; // Fetch the hashed password from the database
      
      if (password_verify($entered_pass, $stored_password)) {
        $_SESSION['id'] = $row['id']; // Use the id from the fetched row
         header('location:myaccount.php');
         exit();
      } else {
         $passwordErr = 'Incorrect username or password!';

         $message[] = mysqli_error($conn);
         
         
      }
   } else {
      //$message[] = 'No user found with the provided credentials.';
      $emailErr = 'No user found with the provided credentials.';
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

<?php
if (isset($result)) {
   echo "Result: " . print_r($result, true) . "<br>";
}

if (isset($row)) {
   echo "Row: " . print_r($row, true) . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="index.css">

</head>

<body>
       <header>
        <img class="logo-image" src="images/KASIDINER.png">
        <a href="#" class="logo">kasidiner</a>
    
        <!--====================MENU BAR also faka hambuger menu bar=======================-->
        <div id="menu-bar" ></div>
    
        <nav class="navbar" >
            <a href="home.php#home">home</a>
            <a href="home.php#speciality">speciality</a>
            <a href="home.php#popular" id="populerdrop">menu</a>
            <a href="home.php#gallery">gallery</a>
            <a href="about.php">about</a>
            <a href="signin.php" class="nav active">signin</a>
            <a href="cont.php">contact us</a>
     
        </nav>
    </header>

    <!-- admin login form section starts  -->
    <section class="order" id="order">

<h1 class="heading"> <span>order</span>now</h1>

<div class="row">
    <div>
        <img src="images/KASIDINER.png">
    </div>

    <form name="orderform" onsubmit="return formValSignIn()" action="signin.php" method="POST">
        <label for="email">Username:</label> <br>
        <div class="inputBox">
            
            <input  name="email" type="email" placeholder="example@gmail.com" id = "email"
            oninput="this.value = this.value.replace(/\s/g, '')">
            <span class="error"> <?php echo  $emailErr; ?> </span>


        </div>
        <label for="password">Password:</label> <br>
        <div class="inputBox">
            <input name="password" type="password" placeholder="Password" id="password"  
            oninput="this.value = this.value.replace(/\s/g, '')">
            <span class="error"> <?php echo  $passwordErr; ?> </span>




        </div>

        <div>
            <label for="form">Don't have an account? <br><a href="createAccountForm.php" id="showPopUp">Create Account</a></label>
        </div>
        
       <input name="submit" type="submit" value="order now" id="button" >

       <!-- <button><a href="#"class="btn" id="signin-button">order now</a></button>  -->
        
    </form>
    
</div>

</section>


    <!-- admin login form section ends -->
</body>

</html>