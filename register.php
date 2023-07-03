<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])) {
    echo "all fields must be filled";
  } else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    require_once("conn.php");

    $name_qry = "SELECT * FROM users WHERE name = ?";
    $stmt = mysqli_prepare($conn, $name_qry);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $name_count = mysqli_stmt_num_rows($stmt);

    $email_qry = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $email_qry);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $email_count = mysqli_stmt_num_rows($stmt);

    if ($name_count) {
      $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
                 <strong>User name already Exist</strong>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
    } else if ($email_count) {
      $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
                 <strong>Email already Exist</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
    } else {
      if ($password != $cpassword) {
        echo "password and confirm password not matched";
      } else {
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

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

          $mail->Subject = 'Email verification';
          $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

          $mail->send();
          // echo 'Message has been sent';

          $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

          // insert in users table
          $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES (?, ?, ?, ?, NULL)";
          $stmt = mysqli_prepare($conn, $sql);
          mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $encrypted_password, $verification_code);
          mysqli_stmt_execute($stmt);

          mysqli_stmt_close($stmt);
          mysqli_close($conn);

          header("Location: email-verification.php?email=" . $email);
          exit();
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      }
    }
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>
  <link rel="stylesheet" href="static/css/register.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>register</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="static/css/login.css">
</head>

<body>
  <div class="header">
    <nav>
      <div class="logo"><a href="home.php">2Do List</a></div>
    </nav>

    <p class="fact">
      <strong>Did you know? </strong> that maintaining a to-do list can help improve productivity and reduce stress!
      It's a great way to stay organized and prioritize tasks!
    </p>
    <div class="image">
      <div class="org-img">
        <img src="static/images/org.jpg" alt="" class="organized-image">
        <p id="simpleUsage"></p>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <h3>Register here: </h3>
    <form action="" method="POST">
      <div class="input-box">
        <span class="icon"></span>
        <input type="text" name="name" id="username" placeholder="Username" required>
        <label for="username">Username</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <label>Email</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label>Password</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
        <label>Confirm Password</label>
      </div>
      <button type="submit">Register</button>
      <?php echo $msg; ?>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
  <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>

  <script>
    new TypeIt("#simpleUsage", {
      strings: "Organize Your Work",
      speed: 50,
      waitUntilVisible: true,
    }).go();
  </script>
</body>

</html>