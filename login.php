<?php
session_start();
require_once("conn.php");
$msg = "";

if (!isset($_SESSION['username'])) {
    header("location:crud.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_search = "SELECT * FROM login WHERE email='$email'";
    $qry = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($qry);

    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($qry);
        $db_pass = $email_pass['password'];
        $pass_decode = password_verify($password, $db_pass);

        if ($pass_decode) {
            $username = $email_pass['username'];
            $id = $email_pass['id'];

            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["loggedin"] = true;

            header("location:crud.php");
            exit();
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
                        <strong>Incorrect password</strong> check your password and try again,
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    } else {
        $msg = '<div class="alert alert-danger alert-dismissible fade show font-weight-bold" role="alert">
                    <strong>Invalid email</strong> check your password and try again,
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}
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
      <a href="#">Services</a>
      <a href="#">Contact</a>
      <button type="submit" class="btn-login">
        Login
      </button>
    </nav>
  </header>
  <div class="welcom-section">

    <p><strong>Welcome to the 2Do List!</strong> your ultimate online task management solution! We are thrilled to have you here,stayorganized and accomplish your goals.</p>
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
        <label>Email</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <label>Password</label>
      </div>
      <button type="submit">Submit</button>
      <div class="reset-link">
        <p>Forgot password? <a href="/forgotPassword.html">Reset here </a>
        </p>

      </div>
      <?php
      echo $msg;
      ?>
    </form>
  </div>
</body>

</html>