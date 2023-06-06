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



//Not complete
// require_once "conn.php";

// $username =$email= $password = $confirm_password = "";
// $username_err =$email_err= $password_err = $confirm_password_err = "";

// if ($_SERVER['REQUEST_METHOD'] == "POST"){

//     // Check if username is empty
//     if(empty(trim($_POST["username"]))){
//         $username_err = "Username cannot be blank";
//     }
//     else{
//         $sql = "SELECT id FROM login WHERE username = ?";
//         $stmt = mysqli_prepare($conn, $sql);
//         if($stmt)
//         {
//             mysqli_stmt_bind_param($stmt, "s", $param_username);

//             // Set the value of param username
//             $param_username = trim($_POST['username']);

//             // Try to execute this statement
//             if(mysqli_stmt_execute($stmt)){
//                 mysqli_stmt_store_result($stmt);
//                 if(mysqli_stmt_num_rows($stmt) == 1)
//                 {
//                     $username_err = "This username is already taken"; 
//                 }
//                 else{
//                     $username = trim($_POST['username']);
//                 }
//             }
//             else{
//                 echo "Something went wrong";
//             }
//         }
//     }

//     mysqli_stmt_close($stmt);

//     // Check if username is empty
//     if(empty(trim($_POST["email"]))){
//         $username_err = "email cannot be blank";
//     }
//     else{
//         $sql = "SELECT id FROM login WHERE email = ?";
//         $stmt = mysqli_prepare($conn, $sql);
//         if($stmt)
//         {
//             mysqli_stmt_bind_param($stmt, "s", $param_email);

//             // Set the value of param username
//             $param_email = trim($_POST['email']);

//             // Try to execute this statement
//             if(mysqli_stmt_execute($stmt)){
//                 mysqli_stmt_store_result($stmt);
//                 if(mysqli_stmt_num_rows($stmt) == 1)
//                 {
//                     $username_err = "This email is already taken"; 
//                 }
//                 else{
//                     $username = trim($_POST['email']);
//                 }
//             }
//             else{
//                 echo "Something went wrong";
//             }
//         }
//     }

//     mysqli_stmt_close($stmt);


// // Check for password
// if(empty(trim($_POST['password']))){
//     $password_err = "Password cannot be blank";
// }
// elseif(strlen(trim($_POST['password'])) < 5){
//     $password_err = "Password cannot be less than 5 characters";
// }
// else{
//     $password = trim($_POST['password']);
// }

// // Check for confirm password field
// if(trim($_POST['password']) !=  trim($_POST['cpassword'])){
//     $password_err = "Passwords should match";
// }


// // If there were no errors, go ahead and insert into the database
// if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&& empty($email_err))
// {
//     $sql = "INSERT INTO login (username,email, password) VALUES (?,?, ?)";
//     $stmt = mysqli_prepare($conn, $sql);
//     if ($stmt)
//     {
//         mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email,$param_password);

//         // Set these parameters
//         $param_email=$email;
//         $param_username = $username;
//         $param_password = password_hash($password, PASSWORD_DEFAULT);

//         // Try to execute the query
//         if (mysqli_stmt_execute($stmt))
//         {
//             header("location: login.php");
//         }
//         else{
//             echo "Something went wrong... cannot redirect!";
//         }
//     }
//     mysqli_stmt_close($stmt);
// }
// mysqli_close($conn);
// }

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
      <?php echo $msg; ?>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>



</body>

</html>