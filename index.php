<?php
session_start();
// Establish database connection
require_once("conn.php");

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
                echo "<td><a href='edit_task.php?id=".$row['id']."'>Edit</a> | <a href='delete_task.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No tasks found.</td></tr>";
        }
        ?>
    </table>
    <a href="add_task.php">Add New Task</a>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

