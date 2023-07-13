<?php
session_start();
require_once("conn.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];

    // Check if the email exists in the user table
    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token in the password_resets table
        $insert_query = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
        mysqli_query($conn, $insert_query);

        // Send the password reset email
        $mail = new PHPMailer(true);
        try {
            // Configure PHPMailer
            // ... $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

          // Send using SMTP
          $mail->isSMTP();

          // Set the SMTP server to send through
          $mail->Host = 'smtp.gmail.com';

          // Enable SMTP authentication
          $mail->SMTPAuth = true;

          // SMTP username
          $mail->Username = '2dolist99@gmail.com';

          // SMTP password
          $mail->Password = 'xdqwmtaudsmuvnga';

          // Enable TLS encryption;
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
          $mail->Port = 587;

          // Recipients
          $mail->setFrom('2dolist99@gmail.com', '2dolist');

          // Add a recipient
          $mail->addAddress($email, $name);

          // Set email format to HTML
          $mail->isHTML(true);
          
          $mail->Subject = 'Reset Password';


            // Set email content
            $resetLink = "http://localhost:5000/2dolist/todolist/reset_password_confirm.php?token=$token";
            $mail->Body = "Click the following link to reset your password: $resetLink";
            $mail->send();

            // Display success message
            $msg ='<div class="alert alert-success" role="alert">
            Password reset link has been sent to your email.
          </div>';
            
        } catch (Exception $e) {
            // Display error message
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    } else {
        // Email not found in the user table
      
        $msg ='<div class="alert alert-danger" role="alert">
        Email not found. Please enter a valid email address.
          </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Password Reset</h1>
        <?php echo $msg ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" id="name" placeholder="User Name" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
    <!-- Remove the container if you want to extend the Footer to full width. -->
<footer class="text-center text-lg-start text-dark" style="padding-top: 188px;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-between p-4 text-white" style="background-color: #299f9f;">
    <!-- Left -->
    <div class="me-5">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container-fluid text-center text-md-start mt-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold">2do-List</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p>
          Are you looking for a seamless and efficient way to manage your tasks and stay organized? Look no further! We are thrilled to present our cutting-edge to-do list app designed to transform the way you approach productivity and task management.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><a href="login.php" class="text-dark">Login</a></p>
          <p><a href="register.php" class="text-dark">Register</a></p>
          <p><a href="contact.php" class="text-dark">Contact</a></p>
       
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><i class="fas fa-home mr-3"></i>Kathamandu , Nepal</p>
          <p><i class="fas fa-envelope mr-3"></i> <a href="mailto:2dolist99@gmail.com">2dolist99@gmail.com"</a></p>
          <p><i class="fas fa-phone mr-3"></i><a href="tel:+9779849140637">+9779849140637</a></p>
          
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 2do-list.com
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
