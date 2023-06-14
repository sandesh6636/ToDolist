<?php
session_start();
// Establish database connection
require_once("conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $taskId = $_POST['taskId'];
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $priority = $_POST['priority'];
    
    // Update the task in the database
    $sql = "UPDATE tasks SET taskName = '$taskName', taskDescription = '$taskDescription', priority = '$priority' WHERE id = '$taskId'";
    if ($conn->query($sql) === TRUE) {
        echo "Task updated successfully!";
    } else {
        echo "Error updating task: " . $conn->error;
    }
}

// Redirect back to the index page
header("Location: index.php");
exit();
?>
