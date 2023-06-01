<?php
include("conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])){
        echo "all filds must be filled";

    }
    else{
        
        $email=$_POST["email"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        if($password!=$cpassword){
            echo"password and conform password not matched";
        }else{
            
            $hasted_password=password_hash($password,PASSWORD_BCRYPT);
            $qry="INSERT INTO login(email,password) VALUES('$email','$hasted_password')";
           
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
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #B4DBDB;
        padding: 20px 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
    }

    .logo {
        font-size: 2rem;
        color: #fff;
    }

    .navigation a {
        position: relative;
        color: #fff;
        margin-left: 40px;
        font-size: 20px;
        text-decoration: none;
    }

    .navigation .btn-login {
        width: 130px;
        height: 50px;
        background: transparent;
        border: 2px solid #fff;
        border-radius: 7px;
        font-size: 1.1rem;
        color: #fff;
        margin-left: 40px;
        transition: .5s;
    }

    .navigation .btn-login:hover {
        background-color: #fff;
        color: black;
    }

    .navigation a::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 4px;
        background: #fff;
        border-radius: 5px;
        left: 0;
        bottom: -6px;
        transform: scaleX(0);
        transition: transform .4s;
        transform-origin: right;
    }

    .navigation a:hover::after {
        transform-origin: left;
        transform: scaleX(1);
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 500px;
        height: 400px;
        padding: 50px;
        margin-top: 100px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .wrapper h3 {
        text-align: center;
    }

    .input-box {
        margin: 20px 0;
    }

    .input-box label {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-weight: bold;
    }

    .input-box input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button[type="submit"] {
        width: 100%;
        height: 40px;
        background-color: #467D7D;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 1.1rem;
        cursor: pointer;
        transition: .5s;
    }

    button[type="submit"]:hover {
        background-color: #335C5C;
    }
</style>

<body>
    <header>
        <h2 class="logo">ToDo List</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About us</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btn-login">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <h3>Login:</h3>
        <form action="" method="POST">
            <div class="input-box">
                <span class="icon"></span>

                <label>Email:</label>
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="input-box">
                <span class="icon"></span>

                <label>Password:</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="input-box">
                <span class="icon"></span>

                <label>Confirm Password:</label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
            </div>
            <button type="submit">Submit</button>
        </form>

    </div>
</body>

</html>