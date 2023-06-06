<?php

// session_start();
// // check if the user is already logged in
// if(isset($_SESSION['username']))
// {
//     header("location:main.php");
//     exit;
// }
// require_once "conn.php";

// $username = $password = "";
// $err = "";
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//   if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
//   {
//       $err = "Please enter username + password";
//   }
//   else{
//       $username = trim($_POST['username']);
//       $password = trim($_POST['password']);
//   }
  


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="stylesheet" href="static\css\login.css">
</head>

<body>
  <header>
    <h2 class="logo"><a href="">2Do List</a></h2>
    <nav class="navigation">
      <a href="#">Home</a>
      <a href="#">About us</a>
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
    </form>
  </div>
</body>

</html>