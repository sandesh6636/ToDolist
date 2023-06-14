<?php
session_start();
// Establish database connection
require_once("conn.php");

// Check if the task ID is provided
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    // Retrieve the task from the database
    $sql = "SELECT * FROM tasks WHERE id = '$taskId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $taskName = $row['taskName'];
        $taskDescription = $row['taskDescription'];
        $priority = $row['priority'];
        
        // Display the task edit form
        echo <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Task</title>
        </head>
        <body>
            <h1>Edit Task</h1>
            <form method="POST" action="update_task.php">
                <input type="hidden" name="taskId" value="$taskId">
                <label>Task Name:</label>
                <input type="text" name="taskName" value="$taskName" required><br>
                <label>Task Description:</label>
                <textarea name="taskDescription" required>$taskDescription</textarea><br>
                <label>Priority:</label>
                <select name="priority">
                    <option value="normal" {($priority === 'normal') ? 'selected' : ''}>Normal</option>
                    <option value="important" {($priority === 'important') ? 'selected' : ''}>Important</option>
                </select><br>
                <input type="submit" value="Update Task">
            </form>
        </body>
        </html>
HTML;
    } else {
        echo "Task not found.";
    }
} else {
    echo "Task ID not provided.";
}

// Close the database connection
$conn->close();
?>
