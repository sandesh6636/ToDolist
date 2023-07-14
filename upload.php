<?php
session_start();
require_once("conn.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit();
}

// Get the user ID
$user_id = $_SESSION['id'];

// Check if a file was uploaded
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
  $file = $_FILES['photo'];

  // Define the directory to store the uploaded photos
  $uploadDir = "uploads/";
  
  // Create the directory if it doesn't exist
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir);
  }

  // Generate a unique file name
  $fileName = uniqid() . "_" . $file['name'];
  $filePath = $uploadDir . $fileName;

  // Move the uploaded file to the destination directory
  if (move_uploaded_file($file['tmp_name'], $filePath)) {
    // Update the 'photo' column in the 'users' table
    $sql = "UPDATE users SET photo = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $filePath, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    // Redirect back to the user profile page
    header("Location: profile.php");
    exit();
  }
}

// If the file upload failed or no file was uploaded, redirect back to the user profile page
header("Location: profile.php");
exit();
?>
