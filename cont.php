<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<span class="close" id="closePopup" onclick="closeContact()">&times;</span>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 justify-content-center align-items-center">
                <!-- Address, Email, and Phone displayed inline -->
                <div class="col-md-4">
                    <div class="info-item" data-aos="fade" data-aos-delay="200">
                        <div class="text-center">
                            <i class="bi bi-geo-alt icons white-bg rounded-circle" style="border-radius: 50%; padding: 10px;"></i>
                        </div>
                        <h3 class="text-center mt-3">Address:</h3>
                        <p class="text-center">
                            100 Pikoko Street,<br />
                            <span style="white-space: nowrap">Kingsway,</span>
                            <span style="white-space: nowrap">Benoni,</span>
                            1501
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item" data-aos="fade" data-aos-delay="300">
                        <div class="text-center">
                            <i class="bi bi-envelope icons white-bg rounded-circle" style="border-radius: 50%; padding: 10px;"></i>
                        </div>
                        <h3 class="text-center mt-3">Email Us</h3>
                        <p class="text-center">
                            <a href="mailto:untitledteam@gmail.com">kasidiner@gmail.com</a>
                        </p>
                    </div>
                </div>
                <!-- End Info Item -->

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center">Get in touch with us</h2>
                <form action="cont.php" method="post" style="align-items: center" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-2 mx-auto">
                        <div class="col-md-12">
                            <label for="name" style="text-align: left; width: 100%">Your Name</label><br>
                            <input type="text" id="name" name="name" class="form-control dark-gray-border text-white filter-select mt-2 mb-2" style="align-items: center; width: 551px; height: 56px" required />
                        </div>

                        <div class="col-md-12">
                            <label for="email" style="text-align: left; width: 100%">Email Address</label><br>
                            <input type="email" id="email" class="form-control dark-gray-border text-white filter-select mt-2 mb-2" name="email" style="align-items: center; width: 551px; height: 56px" required />
                        </div>

                        <div class="col-md-12">
                            <label for="message" style="text-align: left; width: 100%">Message</label><br>
                            <textarea id="message" class="form-control dark-gray-border text-white filter-select mt-2 mb-2" name="message" style="align-items: center; width: 551px; height: 123px;" required></textarea>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="form-control" value="Send Message" style="width: 551px; height: 56px; color: red; background-color: white;border-color:red;" /><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="createAccountForm.js"></script>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("config.php");

    // Connect to the database
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DB_NAME) or die("<p style='color:red'>Could not connect to the database!</p>");

    // Sanitize and validate form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert new message record
    $query_insert_message = "INSERT INTO messages(name, email,  message)
    VALUES('$name', '$email', '$message');";

    $result_insert_message = mysqli_query($conn, $query_insert_message);

    // Disconnect from the database
    mysqli_close($conn);
}
?>