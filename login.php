<?php
// include("conn.php");
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])){
//         echo "all filds must be filled";

//     }
//     else{
        
//         $email=$_POST["email"];
//         $password=$_POST["password"];
//         $cpassword=$_POST["cpassword"];
//         if($password!=$cpassword){
//             echo"password and conform password not matched";
//         }else{
            
//             $hasted_password=password_hash($password,PASSWORD_BCRYPT);
//             $qry="INSERT INTO login(email,password) VALUES('$email','$hasted_password')";
           
//             $res=mysqli_query($conn,$qry);

//             if(!$res){
//                 echo "Failed to register";
//                 echo mysqli_error($conn);
//                 die(); 
//             }else{
//                 echo "Register Sucessfully";
//             }
//         }

//     }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="stylesheet" href="static\css\login.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
  <header>
  <h2 class="logo"><a href="">2Do List</a></h2>
  <nav class="navigation">
    <a href="#">Home</a>
    <a href="#">About us</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
    <button type="submit"class="btn-login">Login</button>
  </nav>
</header>

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
    <!-- div class="input-box">
      <span class="icon"></span>
      <in
fonts.googleapis.com
सन्देश
सन्देश राई
<label>Password</label>
    </div>
    <!-- div class="input-box">
      <span class="icon"></span>
      <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
      <label>Confirm Password</label>
    </div> -->
    <button type="submit">Submit</button>
  </form>
  
</div>
</body>
</html>