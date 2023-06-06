<?php
session_start();
require_once("conn.php");
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["cpassword"])) {
        echo "All fields must be filled";
    } else {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $email_qry = "SELECT * FROM login WHERE email = ?";
        $stmt = mysqli_prepare($conn, $email_qry);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $email_count = mysqli_stmt_num_rows($stmt);

        $username_qry = "SELECT * FROM login WHERE username = ?";
        $stmt = mysqli_prepare($conn, $username_qry);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $username_count = mysqli_stmt_num_rows($stmt);

        if ($email_count) {
            echo "Email Already Exists";
        } elseif ($username_count) {
            echo "Username Already Exists";
        } else {
            if ($password != $cpassword) {
                echo "Password and Confirm Password do not match";
            } else {
                $qry = "INSERT INTO login(username, email, password) VALUES(?, ?, ?)";
                $stmt = mysqli_prepare($conn, $qry);
                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
                $res = mysqli_stmt_execute($stmt);

                if (!$res) {
                    echo "Failed to register";
                    echo mysqli_error($conn);
                    die();
                } else {
                    $msg = "<div class='alert'>Registered Successfully</div>";
                    header("location: login.php");
                    exit();
                }
            }
        }
    }
}
?>