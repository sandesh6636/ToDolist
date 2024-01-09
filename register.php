<?php
<<<<<<< HEAD
require_once("conn.php");
 $msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])){
        echo "all filds must be filled";
=======
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
>>>>>>> update

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])) {
    echo "all fields must be filled";
  } else {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

<<<<<<< HEAD
        $email_qry = "SELECT * FROM login WHERE email = ?";
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
        }
         else if ($email_count) {
          $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
          <strong>Email already Exist</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        } else{

          
          if($password!=$cpassword){
            echo"password and conform password not matched";
          }else{
            
            $hasted_password=password_hash($password,PASSWORD_BCRYPT);
            $qry="INSERT INTO login(username,email,password) VALUES('$username','$email','$hasted_password')";
            
            $res=mysqli_query($conn,$qry);
            
            if(!$res){
              echo "Failed to register";
                echo mysqli_error($conn);
                die(); 
              }else{
                $msg="<div class='alert '>Register Sucessfully</div>";
                header("location: login.php");
              }
            } 
            }

=======
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
      if(strlen($password) < 6){
        $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
        <strong>Password must be Atlest 6 character</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      }
      else if ($password != $cpassword) {
       $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
                 <strong>password and confirm password not matchedt</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
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
>>>>>>> update
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
<<<<<<< HEAD
  <link rel="stylesheet" href="static\css\register.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="static\css\login.css">
=======
  <link rel="stylesheet" href="static/css/register.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>register</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="static/css/login.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <style type="text/css">
        body {
            font-family: 'Alata', sans-serif;
            font-weight: 400;
        }
        </style>
>>>>>>> update
</head>

<body>
  <div class="header">
    <nav>
      <div class="logo"><a href="home.php">2Do List</a></div>
    </nav>

    <div class="image" data-aos="fade-in">
      <div class="org-img">
        <img src="static/images/registerM.jpg" alt="" class="organized-image">
        <p id="simpleUsage"></p>
      </div>
    </div>
    <p class="fact" >
      <strong>Did you know? </strong> that maintaining a to-do list can help improve productivity and reduce stress!
      It's a great way to stay organized and prioritize tasks!
    </p>
  </div>
  <div class="wrapper">
    <h3>Register here: </h3>
    <form action="" method="POST">
      <?php echo $msg; ?>
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
<<<<<<< HEAD
      <?php 
       echo $msg; 
       
      ?>
=======
>>>>>>> update
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
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <!-- our aos data -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        AOS.init({
            offset: 300,
            duration: 1000,
        });
        </script>
</body>

</html>