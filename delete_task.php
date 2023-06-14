<?php
session_start();
// Establish database connection
require_once("conn.php");

// Check if the task ID is provided
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    // Delete the task from the database
    $sql = "DELETE FROM tasks WHERE id = '$taskId'";
    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully!";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
}

// Redirect back to the index page
header("Location: index.php");
exit();
?>
