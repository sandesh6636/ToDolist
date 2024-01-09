<?php
session_start();
require_once("conn.php");
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];

    // Retrieve the email associated with the token
    $token_query = "SELECT email FROM password_resets WHERE token = '$token'";
    $token_result = mysqli_query($conn, $token_query);
    $token_row = mysqli_fetch_assoc($token_result);
    $email = $token_row['email'];

    // Update the user's password in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $update_query = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
    mysqli_query($conn, $update_query);

    // Delete the token from the password_resets table
    $delete_query = "DELETE FROM password_resets WHERE token = '$token'";
    mysqli_query($conn, $delete_query);

    // Redirect to login page or display success message
    $msg ='<div class="alert alert-success" role="alert">
   Your passsword has been sucessfully changed  <a href="login.php" class="alert-link">Login Here</a>.
  </div>';
    
}

// Retrieve the token from the URL parameter
$token = $_GET['token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Password Reset</h1>
        <?php echo $msg ?>
        <form action="" method="POST">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" placeholder="New Password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
    <!-- Remove the container if you want to extend the Footer to full width. -->
<footer class="text-center text-lg-start text-dark" style="padding-top: 205px;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-between p-4 text-white" style="background-color: #299f9f;">
    <!-- Left -->
    <div class="me-5">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container-fluid text-center text-md-start mt-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold">2do-List</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p>
          Are you looking for a seamless and efficient way to manage your tasks and stay organized? Look no further! We are thrilled to present our cutting-edge to-do list app designed to transform the way you approach productivity and task management.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><a href="login.php" class="text-dark">Login</a></p>
          <p><a href="register.php" class="text-dark">Register</a></p>
          <p><a href="contact.php" class="text-dark">Contact</a></p>
       
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p><i class="fas fa-home mr-3"></i>Kathamandu , Nepal</p>
          <p><i class="fas fa-envelope mr-3"></i> <a href="mailto:2dolist99@gmail.com">2dolist99@gmail.com"</a></p>
          <p><i class="fas fa-phone mr-3"></i><a href="tel:+9779849140637">+9779849140637</a></p>
          
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 2do-list.com
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
