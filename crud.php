<?php
session_start();
// Establish database connection
require_once("conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the task ID is provided
    if (isset($_POST['taskId'])) {
        // Update an existing task
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
    } else {
        // Add a new task
        $taskName = $_POST['taskName'];
        $taskDescription = $_POST['taskDescription'];
        $priority = $_POST['priority'];
        $userId = $_SESSION['id']; // Assuming you have stored the user ID in the session

        // Insert the task into the database
        $sql = "INSERT INTO tasks (userId, taskName, taskDescription, priority) VALUES ('$userId', '$taskName', '$taskDescription', '$priority')";
        if ($conn->query($sql) === TRUE) {
            echo "Task added successfully!";
        } else {
            echo "Error adding task: " . $conn->error;
        }
    }

    // Redirect back to the index page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Handle task deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $userId = $_SESSION['id']; // Assuming you have stored the user ID in the session
    $sql = "DELETE FROM tasks WHERE id = '$taskId' AND userId = '$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully!";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
    // Redirect back to the index page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Retrieve user tasks from the database
$userId = $_SESSION['id']; // Assuming you have stored the user ID in the session
$sql = "SELECT * FROM tasks WHERE userId = '$userId'";
$result = $conn->query($sql);

?>

<!-- HTML markup for displaying the to-do list -->
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <table>
        <tr>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
        <?php
        // Display the tasks
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['taskName']."</td>";
                echo "<td>".$row['taskDescription']."</td>";
                echo "<td>".$row['priority']."</td>";
                echo "<td><a href='".$_SERVER['PHP_SELF']."?action=edit&id=".$row['id']."'>Edit</a> | <a href='".$_SERVER['PHP_SELF']."?action=delete&id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No tasks found.</td></tr>";
        }
        ?>
    </table>

    <?php
    // Display the task addition form or task edit form
    if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
        $taskId = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id = '$taskId' AND userId = '$userId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $taskName = $row['taskName'];
            $taskDescription = $row['taskDescription'];
            $priority = $row['priority'];

            echo <<<HTML
            <h2>Edit Task</h2>
            <form method="POST" action="{$_SERVER['PHP_SELF']}">
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
            HTML;
        } else {
            echo "Task not found.";
        }
    } else {
        echo <<<HTML
        <h2>Add New Task</h2>
        <form method="POST" action="{$_SERVER['PHP_SELF']}">
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
        HTML;
    }
    ?>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

