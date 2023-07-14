<?php
session_start();
require_once("conn.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit();
}

// Retrieve the user's data from the database
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="path/to/your/styles.css">

  <style>
    :root {
      --dark-color: #00203FFF;
      --darker-color: #084C61FF;
      --darkest-color: #07689F;
      --light-color: #B5D9EB;
      --lighter-color: #CEE6F2;
      --lightest-color: #FEFFFF;
    }

    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      padding-top: 200px;
      min-height: 100vh;
      background-color: var(--light-color);
    }

    header {
      display: flex;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 20px 30px;
      justify-content: space-between;
      align-items: center;
      z-index: 99;
      background-color: var(--lightest-color);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 2rem;
    }

    .logo a {
      text-decoration: none;
      color: var(--dark-color);
      font-family: 'Montserrat', sans-serif;
      font-weight: bold;
    }

    .navigation a {
      position: relative;
      color: var(--dark-color);
      margin-left: 40px;
      font-family: 'Geologica', sans-serif;
      font-size: 20px;
      text-decoration: none;
    }

    .navigation .btn-login {
      width: 130px;
      height: 50px;
      background: transparent;
      border: 2px solid var(--dark-color);
      background-color: var(--dark-color);
      border-radius: 7px;
      color: var(--lightest-color);
      margin-left: 40px;
      transition: .5s;
    }

    .navigation .btn-login a {
      margin: 0;
      color: var(--lightest-color);
    }

    .navigation .btn-login:hover {
      background-color: var(--lightest-color);
      color: var(--dark-color);
    }

    .navigation .btn-login a:hover {
      color: var(--dark-color);
    }

    .navigation a::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 4px;
      background: var(--darker-color);
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

    .container {
      max-width: 600px;
      margin-top: 150px;
      padding: 20px;
      background-color: var(--lightest-color);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .card {
      margin-bottom: 20px;
      padding: 20px;
      background-color: var(--lightest-color);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .card-body {
      display: flex;
      align-items: center;
    }

    .user-avatar {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
    }

    .user-details {
      text-align: center;
      margin-top: 20px;
    }

    .user-name {
      font-size: 24px;
      color: var(--dark-color);
      margin-bottom: 5px;
    }

    .user-email {
      color: var(--darker-color);
      margin: 0;
    }

    .info-label {
      font-weight: bold;
      color: var(--dark-color);
    }

    .info-value {
      color: var(--darker-color);
      margin: 5px 0;
    }

    hr {
      border: none;
      border-top: 1px solid var(--light-color);
      margin: 20px 0;
    }

    input[type="file"] {
      display: none;
    }

    label {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
    }

    /* Style for the upload button */
    button[type="submit"] {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
    }
   
  </style>
</head>

<body>
  <header>
    <h2 class="logo"><a href="home.php">2Do List</a></h2>
    <nav class="navigation">
      <a href="chart.php">Chart</a>
      <a href="crud.php">Add Task</a>
      <button type="submit" class="btn-login">
        <a href="logout.php">Logout</a>
      </button>
    </nav>
  </header>

  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center">
          <img src="<?php echo $user['photo']; ?>" alt="User" class="user-avatar">
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="img-con">

              <label for="photo">Choose a file</label>
              <input type="file" name="photo" id="photo">
              <button type="submit">Upload</button>
            </div>
          </form>

          <div class="user-details">
            <h4 class="user-name"><?php echo $user['name']; ?></h4>
            <p class="user-email"><?php echo $user['email']; ?></p>
          </div>
        </div>
      </div>
    </div>


  </div>
</body>

</html>