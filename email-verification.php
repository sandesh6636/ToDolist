<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    input[type="email"],
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .alert {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
      require_once('conn.php');
      session_start();
      $msg = "";

      if (isset($_POST["verify_email"])) {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];

        // Check if email and verification code match
        $sql = "SELECT * FROM users WHERE email = ? AND verification_code = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $verification_code);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $count = mysqli_stmt_num_rows($stmt);

        if ($count > 0) {
          // Update email verification status in the database
          $update_sql = "UPDATE users SET email_verified_at = NOW() WHERE email = ?";
          $update_stmt = mysqli_prepare($conn, $update_sql);
          mysqli_stmt_bind_param($update_stmt, "s", $email);
          mysqli_stmt_execute($update_stmt);

          // Set email verification status in session
          $_SESSION["email_verified"] = true;

          // Redirect to login page
          header("Location: login.php");
          exit();
        } else {
          $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Verification code failed.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }
    ?>

    <h2>Email Verification</h2>
    <form method="POST" action="">
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="verification_code" placeholder="Verification Code" required>
      <button type="submit" name="verify_email">Verify Email</button>
      <?php echo $msg; ?>
    </form>
  </div>
</body>
</html>
