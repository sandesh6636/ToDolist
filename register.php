<?php
require_once("conn.php");
 $msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])){
        echo "all filds must be filled";

    }
    else{
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];

        
        $username_qry = "SELECT * FROM login WHERE username = ?";
        $stmt = mysqli_prepare($conn, $username_qry);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $username_count = mysqli_stmt_num_rows($stmt);

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

    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>
  <link rel="stylesheet" href="static\css\register.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="static\css\login.css">
</head>

<body>
  <div class="header">
    <nav>
      <div class="logo"><a href="home.php">2Do List</a></div>

    </nav>

   
    <p class="fact"> 
    <strong>Did you know? </strong> that maintaining a to-do list can help improve productivity and reduce stress! It's a great way to stay organized and prioritize tasks!</p>
    <div class="image">
      <div class="org-img">
        <img src="static\images\org.jpg" alt="" class="organized-image">
      <p id="simpleUsage"></p>
      </div>

    </div>
  </div>
  <div class="wrapper">

    <h3>Register here: </h3>
    <form action=" " method="POST">
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
      <?php 
       echo $msg; 
       
      ?>
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