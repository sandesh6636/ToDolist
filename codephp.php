<?php
session_start();
$msg = "";

if (!isset($_SESSION['username'])) {
  header("location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("conn.php");
  $task = $_POST['task'];

  // Get the logged-in user's ID from the session
  $user_id = $_SESSION["id"];

  // Insert the task into the "tasks" table with the current timestamp
  $insert_query = "INSERT INTO tasks (user_id, task, created_at) VALUES ('$user_id', '$task', CURRENT_TIMESTAMP)";
  if (mysqli_query($conn, $insert_query)) {
    $msg = "Task added successfully.";
  } else {
    $msg = "Error adding task: " . mysqli_error($conn);
  }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_task'])) {
  require_once("conn.php");
  $task_id = $_POST['task_id'];
  $new_task = $_POST['new_task'];

  // Update the task in the "tasks" table
  $update_query = "UPDATE tasks SET task = '$new_task' WHERE id = '$task_id'";
  if (mysqli_query($conn, $update_query)) {
    $msg = "Task updated successfully.";
  } else {
    $msg = "Error updating task: " . mysqli_error($conn);
  }
}
?>

<!-- Rest of your main page HTML code -->
सन्देश
सन्देश राई
<?php
session_start();
$msg = "";

if (!isset($_SESSION['username'])) {
  header("location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once("conn.php");
  $task = $_POST['task'];

  // Get the logged-in user's ID from the session
  $user_id = $_SESSION["id"];

  // Insert the task into the "tasks" table with the current timestamp
  $insert_query = "INSERT INTO tasks (user_id, task, created_at) VALUES ('$user_id', '$task', CURRENT_TIMESTAMP)";
  if (mysqli_query($conn, $insert_query)) {
    $msg = "Task added successfully.";
  } else {
    $msg = "Error adding task: " . mysqli_error($conn);
  }
}
?>

<!-- Rest of your main page HTML code -->