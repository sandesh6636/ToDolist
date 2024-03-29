<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('conn.php');
// Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST["resend"])) {
    $email = $_POST["email"];

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

        // Send using SMTP
        $mail->isSMTP();

        // Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        // Enable SMTP authentication
        $mail->SMTPAuth = true;

        // SMTP username
        $mail->Username = '2dolist99@gmail.com';

        // SMTP password
        $mail->Password = 'xdqwmtaudsmuvnga';

        // Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('2dolist99@gmail.com', '2dolist');

        // Add a recipient
        $mail->addAddress($email, $name);

        // Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        
        // Update the verification code in the users table
        $update_query = "UPDATE users SET verification_code='$verification_code' WHERE email='$email'";
        mysqli_query($conn, $update_query);

        header("Location: email-verification.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resend</title>
</head>
<body>
<form method="POST">
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="submit" name="resend" value="Resend">
</form>
</body>
</html>
