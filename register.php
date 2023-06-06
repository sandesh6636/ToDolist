<?php
require_once("conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])){
        echo "all filds must be filled";

    }
    else{
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
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
                echo "Register Sucessfully";
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
</head>

<body>
  <div class="header">
    <nav>
      <div class="logo"><a href="home.html">2Do List</a></div>

    </nav>

    <p class="fact">Did you know that maintaining a to-do list can help improve productivity and reduce stress? It's a great way to stay organized and prioritize tasks!</p>
  </div>
  <div class="wrapper">
    <h3>Register here:</h3>
    <form action="" method="POST">
      <div class="input-box">
        <span class="icon"></span>
        <input type="text" name="username" id="username" placeholder="username">
        <label for="username">Username</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="email" name="email" id="email" placeholder="Email">
        <label>Email</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="password" name="password" id="password" placeholder="Password">
        <label>Password</label>
      </div>
      <div class="input-box">
        <span class="icon"></span>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
        <label>Confirm Password</label>
      </div>
      <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="/todolist/login.php">Login here</a></p>
  </div>



</body>

</html>