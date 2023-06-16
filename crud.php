<?php
session_start();
// Establish database connection
require_once("conn.php");

// Check if the form is submitted
// Check if the form is submitted
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
}

header {
  display: flex;
  position: fixed;
  top: 0;
  left: 0;
  width: 90%;
  padding: 20px 30px;
  justify-content: space-between;
  align-items: center;
  z-index: 99;
  background-color: var(--lightest-color);
}

.logo {
  font-size: 2rem;
}

.logo a {
  text-decoration: none;
  color: var(--dark-color);
  font-family: Arial, sans-serif;
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
.navigation .btn-login a{
margin:0;
color:var(--lightest-color);
}
.navigation .btn-login:hover {
background-color: var(--lightest-color);
color: var(--dark-color);
}
.navigation .btn-login a:hover {
/* background-color: var(--lightest-color); */
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
/* Add this CSS to style the table input */

table {
    text-transform: capitalize;
  width: 100%;
  border-collapse: collapse;
}

th, td {
    text-transform: capitalize;
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

form {
    margin-top: 30px;
  margin-bottom: 20px;
}

form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

form input[type="text"],
form textarea,
form select {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 10px;
}

form input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #45a049;
}
/* Add this CSS to style the Edit and Delete buttons */

table {
    margin-top: 10px;
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

.actions {
  display: flex;
  justify-content: space-around;
}

.actions a {
    text-transform: capitalize;
    letter-spacing:1px;
  padding: 5px 10px;
  border-radius: 3px;
  text-decoration: none;
  color: #fff;
}

.edit {
  background-color: #4caf50;
}

.delete {
  background-color: #f44336;
}

.actions a:hover {
  opacity: 0.8;
}

#simpleUsage{
    text-transform: capitalize;
    letter-spacing:1px;
}
h1,h2{
    text-transform: capitalize;
    letter-spacing:2px;
}
h2{
    border: 2px solid transparent;
    border-radius:30px;
}
</style>
<body>
<header>
        <!-- Header content here -->
        <h2 class="logo"><a href="home.php">2Do List</a></h2>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="#">About us</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button type="submit" class="btn-login">
                <a href="logout.php">Logout</a>
            </button>
        </nav>
    </header>
    
    <h1>To-Do List</h1>
    <p id="simpleUsage"></p>
    <table>
    <tr>
        <th>Task Name</th>
        <th>Task Description</th>
        <th>Priority</th>
        <!-- <th>Actions</th> -->
    </tr>
    <?php
    // Display the tasks
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['taskName']."</td>";
            echo "<td>".$row['taskDescription']."</td>";
            echo "<td>".$row['priority']."</td>";
            echo "<td class='actions'><a class='edit' href='".$_SERVER['PHP_SELF']."?action=edit&id=".$row['id']."'>Edit</a> <a class='delete' href='".$_SERVER['PHP_SELF']."?action=delete&id=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No tasks found.</td></tr>";
    }
    ?>
</table>
    </table>

    <?php
    // Display the task addition form or task edit form
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
}
 else {
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
<script>
    // Add this JavaScript code for dynamic animation

// Function to show the task form dynamically
function showTaskForm(action, id) {
  const formContainer = document.getElementById('taskFormContainer');
  const form = document.getElementById('taskForm');
  const formAction = document.getElementById('formAction');

  formAction.value = action;

  if (action === 'edit') {
    formAction.value = 'edit';
    form.action = `${window.location.pathname}?action=edit&id=${id}`;
    formContainer.style.display = 'block';
    smoothScrollTo(formContainer);
  } else if (action === 'add') {
    formAction.value = 'add';
    form.action = `${window.location.pathname}?action=add`;
    formContainer.style.display = 'block';
    smoothScrollTo(formContainer);
  } else {
    formContainer.style.display = 'none';
  }
}

// Function to scroll smoothly to an element
function smoothScrollTo(element) {
  window.scroll({
    behavior: 'smooth',
    left: 0,
    top: element.offsetTop
  });
}

</script>
<script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
  <script>

new TypeIt("#simpleUsage", {
  strings: "Don't wait for motivation to strike. Take action and add tasks. The motivation will follow",
  speed: 50,
  waitUntilVisible: true,
}).go();
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

