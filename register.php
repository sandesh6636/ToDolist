<?php
// session_start();
// require_once("conn.php");
// $email_msg = $username_msg = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])) {
//     echo "All fields must be filled";
//   } else {
//     $username = $_POST["username"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $cpassword = $_POST["cpassword"];
//     $hashed_password = password_hash($password, PASSWORD_BCRYPT);

//     $email_qry = "SELECT * FROM login WHERE email = ?";
//     $stmt = mysqli_prepare($conn, $email_qry);
//     mysqli_stmt_bind_param($stmt, "s", $email);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_store_result($stmt);
//     $email_count = mysqli_stmt_num_rows($stmt);

//     $username_qry = "SELECT * FROM login WHERE username = ?";
//     $stmt = mysqli_prepare($conn, $username_qry);
//     mysqli_stmt_bind_param($stmt, "s", $username);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_store_result($stmt);
//     $username_count = mysqli_stmt_num_rows($stmt);

//     if ($username_count) {

//       $username_msg = "<div class='alert '>Email Already Exist</div>";
//     }
//      else if ($email_count) {
//       $email_msg = "<div class='alert '>Email Already Exist</div>";
//     } else {
//       if ($password != $cpassword) {
//         echo "Password and Confirm Password do not match";
//       } else {
//         $qry = "INSERT INTO login(username, email, password) VALUES(?, ?, ?)";
//         $stmt = mysqli_prepare($conn, $qry);
//         mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
//         $res = mysqli_stmt_execute($stmt);

//         if (!$res) {
//           echo "Failed to register";
//           echo mysqli_error($conn);
//           die();
//         } else {
//           $msg = "<div class='alert'>Registered Successfully</div>";
//           header("location: login.php");
//           exit();
//         }
//       }
//     }
//   }
// }



require_once("conn.php");
$email_msg = $username_msg = "";
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
    
          $username_msg = "<div class='alert '>Username Already Exist</div>";
        }
         else if ($email_count) {
          $email_msg = "<div class='alert '>Email Already Exist</div>";
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
</head>

<body>
  <div class="header">
    <nav>
      <div class="logo"><a href="home.html">2Do List</a></div>

    </nav>

    <p class="fact">Did you know that maintaining a to-do list can help improve productivity and reduce stress? It's a great way to stay organized and prioritize tasks!</p>
    <div class="image">
      <div class="org-img">
        <img src="static\images\org.jpg" alt="" class="organized-image">
        <p class="image-caption">Organize Your Work</p>
      </div>

    </div>
  </div>
  <div class="wrapper">

    <h3>Register here: </h3>
    <form action=" " method="POST">
      <div class="input-box">
        <span class="icon"></span>
        <input type="text" name="username" id="username" placeholder="Username">
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
      <?php 
        echo $username_msg; 
       echo $email_msg;
      
      ?>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>



</body>

</html>