<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location: main.php");
    exit;
}
if (isset($_POST['submit'])) {
    require_once("conn.php");
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
            echo "Login successful";
        } else {
            echo "Incorrect password";
            echo "<script>location.replace('home.php');</script>";
        }
    } else {
        echo "Invalid email";
    }
}
?>