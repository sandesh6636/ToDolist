<?php
session_start();
require_once("conn.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$Emsg = $msg =$Vmsg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_search = "SELECT * FROM users WHERE email='$email'";
    $qry = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($qry);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($qry);
        $db_pass = $email_pass['password'];
        $pass_decode = password_verify($password, $db_pass);

        if ($pass_decode) {
            $username = $email_pass['name'];
            $id = $email_pass['id'];
            $email_verified_at = $email_pass['email_verified_at'];

            if ($email_verified_at != null) {
                $_SESSION["username"] = $name;
                $_SESSION["id"] = $id;
                $_SESSION["loggedin"] = true;

                header("location: crud.php");
                exit();
            } else {
                $Vmsg = '<div class="alert alert-danger" role="alert">
                Verify you Email first  <a href="email-verification.php" class="alert-link">verify your email</a>.
              </div>';
            }
        } else {
            $msg = '<div class="alert alert-danger" role="alert" style="border: none; color: red;  background-color: transparent;">
            Incorrect password.
          </div>
          ';
        }
    } else {
        $Emsg = '<div class="alert alert-danger" role="alert" style="border: none; color: red;  background-color: transparent;">
        Invalid email.
      </div>
      ';
    }
}

$email_verified_at = isset($email_verified_at) ? $email_verified_at : null;
$email = isset($email) ? $email : "";

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="static\css\login.css">
</head>

<body>
  <header>
    <h2 class="logo"><a href="home.php">2Do List</a></h2>
    <nav class="navigation">
      <a href="home.php">Home</a>
      <a href="about.php">About us</a>
      
      <a href="contactus.php">Contact</a>
      <a href="register.php" id="register-btn">Register</a>
      
    </nav>
  </header>
  <div class="welcom-section">
 <p id="simpleUsage"><strong>Welcome to the 2Do List!</strong> </p>your ultimate online task management solution! We are thrilled to have you here,stayorganized and accomplish your goals.

    <div class="register-link">
      <p>Not registered? <a href="register.php">Register here</a></p>
      
    </div>
  </div>
  <div class="wrapper">
    <h3>Login:</h3>
    <form action="" method="POST">
      <div class="input-box">
        <span class="email">
          </span>
          <input type="email" name="email" id="email" placeholder="Email" required>
          <?php echo $Emsg; ?>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"></span>
          <input type="password" name="password" id="password" placeholder="Password" required>
          <?php echo $msg; ?>

          <label>Password</label>
        </div>
        <button type="submit">Submit</button>
        <div class="reset-link">
          <p>Forgot password? <a href="reset.php">Reset here </a>
        </p>
        <?php echo $Vmsg; ?>

      </div>
    
      <?php
      // echo $msg;
      ?>
    </form>
  </div>
  <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
  <script>
    
    new TypeIt("#simpleUsage", {
      strings: "",
      speed: 50,
      waitUntilVisible: true,
    }).go();
    </script>
</body>

</html>