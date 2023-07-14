<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Set up email headers
  $to = "your-email@example.com";
  $subject = "New contact form submission";

  $mail = new PHPMailer(true);
  try {
    // Enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

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

    // Enable TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    // TCP port to connect to
    $mail->Port = 587;

    // Set email format to HTML
    $mail->isHTML(true);

    $mail->setFrom($email, $name);

    // Add a recipient
    $mail->addAddress($to);

    $mail->Subject = $subject;
    $mail->Body = "<p><strong>Name:</strong> $name</p><p><strong>Email:</strong> $email</p><p><strong>Message:</strong> $message</p>";

    $mail->send();
    $msg = '<div class="alert alert-success alert-dismissible fade show font-weight-bold" role="alert">
    <strong>Email sent successfully!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } catch (Exception $e) {
    $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
    <strong>Failed to send email. Error: {$mail->ErrorInfo}</strong>     
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="static/css/contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header>
      <h2 class="logo"><a href="home.php">2Do List</a></h2>
      <nav class="navigation">
        <a href="home.php">Home</a>
        <a href="about.php">About us</a>
        <a href="#">Contact</a>
        <a href="login.php">Login</a>
        <button type="submit" class="btn-login">
          <a href="register.php">
            Sign up
          </a>
        </button>
      </nav>
    </header>
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">Kathmandu, Nepal</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+977 9849140637</div>
            <div class="text-two">+977 9849780929</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">2dolist99@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
          <p>If you have any work for me or any types of queries related to our 2Do List, you can send me a message here. It's my pleasure to help you.</p>
          <form action="" method="POST">
            <div class="input-box">
              <input type="text" name="name" placeholder="Enter your name">
            </div>
            <div class="input-box">
              <input type="email" name="email" placeholder="Enter your email">
            </div>
            <div class="input-box message-box">
              <textarea name="message" placeholder="Enter your message"></textarea>
            </div>
            <div class="button">
              <button type="submit" class="btn btn-outline-success">Send</button>
            </div>
            <?php
            echo $msg;
            ?>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
