<?php
// Establish database connection
session_start();
require_once("conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $priority = $_POST['priority'];
    $userId = $_SESSION['id']; // Assuming you have stored the user ID in the session

    // Insert the task into the database
    $sql = "INSERT INTO tasks (userId, taskName, taskDescription, priority) VALUES ('$userId', '$taskName', '$taskDescription', '$priority')";
    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!-- HTML markup for the task addition form -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>
</head>
<body>
    <h1>Add New Task</h1>
    <form method="POST" action="">
        <label>Task Name:</label>
        <input type="text" name="taskName" required><br>
        <label>Task Description:</label>
        <textarea name="taskDescription" required></textarea><br>
        <label>Priority:</label>
        <select name="priority">
            <option value="normal">Normal</option>
            <option value="important">Important</option>
        </select><br>
        <input type="submit" value="Add Task">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
