<?php
require_once("conn.php");
require_once("phpmailer/PHPMailer.php");
require_once("phpmailer/SMTP.php");
require_once("phpmailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$msg = "";
function generateVerificationCode($length = 8) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $code = '';

  for ($i = 0; $i < $length; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $code .= $characters[$index];
  }

  return $code;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])) {
        echo "all fields must be filled";
    } else {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        $username_qry = "SELECT * FROM logins WHERE username = ?";
        $stmt = mysqli_prepare($conn, $username_qry);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $username_count = mysqli_stmt_num_rows($stmt);

        $email_qry = "SELECT * FROM loginS WHERE email = ?";
        $stmt = mysqli_prepare($conn, $email_qry);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $email_count = mysqli_stmt_num_rows($stmt);

        if ($username_count) {
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
                $verificationCode = generateVerificationCode(); // Replace with your own code to generate a verification code
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $qry = "INSERT INTO logins (username, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, 0)";
                $stmt = mysqli_prepare($conn, $qry);
                mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $verificationCode);
                mysqli_stmt_execute($stmt);

                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    $verificationLink = "https://example.com/verify.php?code=$verificationCode";
                    $emailSubject = "Verify Your Email";
                    $emailMessage = "Please click the following link to verify your email address: <a href='$verificationLink'>$verificationLink</a>";

                    $mail = new PHPMailer(true);
                    try {
                        // SMTP configuration
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.example.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = '2dolist99@gmail.com';
                        $mail->Password   = 'mynameissandeshrai100';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;

                        // Sender and recipient settings
                        $mail->setFrom('2dolist99@gmail.com', '2dolist');
                        $mail->addAddress($email, $username);

                        // Email content
                        $mail->isHTML(true);
                        $mail->Subject = $emailSubject;
                        $mail->Body    = $emailMessage;

                        $mail->send();

                        $msg = "<div class='alert'>Registration Successful. Please check your email to verify your account.</div>";
                        header("location: login.php");
                    } catch (Exception $e) {
                        echo "Failed to send email: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "Failed to register";
                    echo mysqli_error($conn);
                    die();
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
  <title>Bootstrap Example</title>
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
        <input type="text" name="username" id="username" placeholder="Username" required>
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

