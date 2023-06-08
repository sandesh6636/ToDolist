CREATE TABLE tasks (
  id INT PRIMARY KEY AUTO_INCREMENT,
  userId INT,
  taskName VARCHAR(255),
  taskDescription VARCHAR(255),
  priority ENUM('normal', 'important') DEFAULT 'normal',
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (userId) REFERENCES users(id)
);
सन्देश
सन्देश राई
<?php
define('host', "localhost");
define('port', "3307");
define('username', "root");
define('password', "");
define('database', "todolist");

$conn = mysqli_connect(host . ":" . port, username, password, database);

// Function to insert a new task into the 'tasks' table
function createTask($userId, $taskName, $taskDescription, $priority)
{
    global $conn;
    // Escape any special characters to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $userId);
    $taskName = mysqli_real_escape_string($conn, $taskName);
    $taskDescription = mysqli_real_escape_string($conn, $taskDescription);
    $priority = mysqli_real_escape_string($conn, $priority);

    // Generate the SQL query
    $query = "INSERT INTO tasks (userId, taskName, taskDescription, priority) VALUES ('$userId', '$taskName', '$taskDescription', '$priority')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Task created successfully";
    } else {
        echo "Error creating task: " . mysqli_error($conn);
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = 1; // Assuming you have a user with ID 1 (you can modify this accordingly)
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $priority = $_POST['priority'];

    // Call the createTask function with the submitted data
    createTask($userId, $taskName, $taskDescription, $priority);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
</head>

<body>
    <h3>Create a New Task</h3>
    <form action="" method="POST">
        <label for="taskName">Task Name:</label><br>
        <input type="text" id="taskName" name="taskName" required><br><br>

        <label for="taskDescription">Task Description:</label><br>
        <input type="text" id="taskDescription" name="taskDescription" required><br><br>

        <label for="priority">Priority:</label><br>
        <select id="priority" name="priority">
            <option value="normal">Normal</option>
            <option value="important">Important</option>
        </select><br><br>

        <input type="submit" value="Create Task">
    </form>
</body>

</html>
सन्देश
सन्देश राई
var importantTaskCount = 0; // Track the number of important tasks added
var normalTaskCount = 0; // Track the number of normal tasks added

// Function to create a task element
function createTaskElement(taskName, taskDescription) {
  var taskElement = document.createElement('div');
  taskElement.classList.add('task');

  var taskInfo = document.createElement('div');
  taskInfo.classList.add('task-info');

  var taskNameElement = document.createElement('span');
  taskNameElement.textContent = taskName;

  var taskDescriptionElement = document.createElement('p');
  taskDescriptionElement.textContent = taskDescription;

  var taskDateElement = document.createElement('p');
  var currentDate = new Date();
  taskDateElement.textContent = 'Created on: ' + currentDate.toLocaleString();

  var buttonContainer = document.createElement('div');
  buttonContainer.classList.add('button-container');

  var editButton = document.createElement('button');
  editButton.textContent = 'Edit';
  editButton.addEventListener('click', function() {
    var newTaskName = prompt('Enter the new task name:', taskNameElement.textContent);
    if (newTaskName) {
      taskNameElement.textContent = newTaskName;
    }

    var newTaskDescription = prompt('Enter the new task description:', taskDescriptionElement.textContent);
    if (newTaskDescription) {
      taskDescriptionElement.textContent = newTaskDescription;
    }
  });

  var deleteButton = document.createElement('button');
  deleteButton.textContent = 'Delete';
  deleteButton.addEventListener('click', function() {
    taskElement.classList.add('crossed-out');
    // Remove the <hr> element following the task element
    if (taskElement.nextElementSibling.tagName === 'HR') {
      taskElement.nextElementSibling.remove();
    }
  });

  // Append elements to the task element
  buttonContainer.appendChild(editButton);
  buttonContainer.appendChild(deleteButton);

  taskInfo.appendChild(taskNameElement);
  taskInfo.appendChild(taskDescriptionElement);
  taskInfo.appendChild(taskDateElement);

  taskElement.appendChild(taskInfo);
  taskElement.appendChild(buttonContainer);

  return taskElement;
}

// Function to add an important task
function addImportantTask(event) {
  event.preventDefault();

  if (importantTaskCount >= 2) {
    // Maximum number of important tasks reached
    alert('You can only add 2 important tasks.');
    return;
  }

  // Get input values
  var taskName = document.getElementById('important-task-add').value;
  var taskDescription = document.getElementById('important-task-description').value;

  // Create a new task element
  var taskElement = createTaskElement(taskName, taskDescription);

  // Append the task element to the important task list
  var taskList = document.getElementById('important-task-list');
  taskList.appendChild(taskElement);
  var horizontalRule = document.createElement('hr');
  taskList.appendChild(horizontalRule);
  // Clear input fields
  document.getElementById('important-task-add').value = '';
  document.getElementById('important-task-description').value = '';

  importantTaskCount++; // Increment the important task count
}

// Function to add a normal task
// Function to add a normal task
function addNormalTask(event) {
  event.preventDefault();

  if (normalTaskCount >= 5) {
    // Maximum number of normal tasks reached
    alert('You can only add 5 normal tasks.');
    return;
  }

  // Get input values
  var taskName = document.getElementById('normal-task-add').value;
  var taskDescription = document.getElementById('normal-task-description').value;

  // Create a new task element
  var taskElement = createTaskElement(taskName, taskDescription);

  // Append the task element to the normal task list
  var taskList = document.getElementById('normal-task-list');
  taskList.appendChild(taskElement);
  var horizontalRule = document.createElement('hr');
  taskList.appendChild(horizontalRule);
  // Clear input fields
  document.getElementById('normal-task-add').value = '';
  document.getElementById('normal-task-description').value = '';

  normalTaskCount++; // Increment the normal task count

  // Check if it's been 24 hours since the first normal task was added
  if (normalTaskCount === 1) {
    var currentDate = new Date();
    var firstTaskDate = taskElement.querySelector('.task-info p:last-child').textContent;
    firstTaskDate = firstTaskDate.replace('Created on: ', ''); // Remove the "Created on: " prefix
    var taskDate = new Date(firstTaskDate);

    if (currentDate - taskDate >= 24 * 60 * 60 * 1000) {
      alert('It has been 24 hours since the first normal task was added.');
    }
  } else if (normalTaskCount > 1 && normalTaskCount <= 5) {
    var previousTaskElement = taskList.children[normalTaskCount - 2];
    var previousTaskDate = previousTaskElement.querySelector('.task-info p:last-child').textContent;
    previousTaskDate = previousTaskDate.replace('Created on: ', ''); // Remove the "Created on: " prefix
    var previousTa
सन्देश
सन्देश राई
previousTaskDate = new Date(previousTaskDate);

    if (currentDate - previousTaskDate >= 24 * 60 * 60 * 1000) {
      alert('It has been 24 hours since the last normal task was added.');
    }
  }
}
सन्देश
सन्देश राई
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto:wght@100;300&family=Rubik+Pixels&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Geologica:wght@600&family=Montserrat:wght@100&family=Roboto:wght@100;300&family=Rubik+Pixels&display=swap');
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
    padding-top:200px;
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
  
  .navigation .btn-login:hover {
    background-color: var(--lightest-color);
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
  
  .wrapper {
    background-color: var(--lightest-color);
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    width: 300px;
  }
  
  h3 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  form {
    margin-bottom: 10px;
  }
  
  .input-box {
    position: relative;
    margin-bottom: 15px;
  }
  
  input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 3px;
    border-bottom: 2px solid #ccc;
  }
  
  input[type="text"]:focus {
    outline: none;
    border-color: var(--dark-color);
  }
  
  input[type="text"]:valid+label,
  input[type="text"]:focus+label {
    top: -10px;
    font-size: 12px;
    color: #333;
  }
  
  .add-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: var(--dark-color);
    color: var(--lightest-color);
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .add-btn:hover {
    background-color: var(--darker-color);
  }
  
  .error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
  }
  
  .success-message {
    color: green;
    font-size: 14px;
    margin-top: 5px;
  }
  
  .list {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  
  .list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: var(--lighter-color);
    margin-bottom: 5px;
    border-radius: 5px;
  }
  
  .list-item:last-child {
    margin-bottom: 0;
  }
  
  .list-item .item-text {
    flex: 1;
    margin-right: 10px;
  }
  
  .list-item .delete-btn {
    background-color: var(--dark-color);
    color: var(--lightest-color);
    border: none;
    padding: 5px 10px;
    font-size: 14px;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .list-item .delete-btn:hover {
    background-color: var(--darker-color);
  }
  
  .footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    background-color: var(--dark-color);
    color: var(--lightest-color);
    text-align: center;
  }
  
  .footer p {
    margin: 0;
    font-size: 14px;
  }
  
  
    .crossed-out {
      text-decoration: line-through;
      opacity: 0.5;
    }
    /* CSS code */
.task-list {
  margin-bottom: 20px;
}

.task {
  background-color: #f0f0f0;
  padding: 10px;
  margin-bottom: 10px;
}

.task.crossed-out {
  text-decoration: line-through;
}

.task-info {
  margin-bottom: 10px;
}

.task-info span {
  font-weight: bold;
}

.task-info p {
  margin: 5px 0;
}

.button-container {
  display: flex;
  justify-content: space-between;
}

.button-container button {
  background-color: #4caf50;
  color: w
fonts.googleapis.com
सन्देश
सन्देश राई
white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.button-container button:hover {
  background-color: #45a049;
}
सन्देश
सन्देश राई
<!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
  </head>
  
  <style>


  </style>
  </head>
  
  <body>
    <header>
      <!-- Header content here -->
      <h2 class="logo"><a href="">2Do List</a></h2>
      <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">About us</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <button type="submit" class="btn-login">
          Logout
        </button>
      </nav>
    </header>
    <div class="welcom-section">
      <!-- Welcome section content here -->
    </div>
    <div class="add-task-cointainer">
      <div class="wrapper">
        <h3>Add Important Task:</h3>
        <form id="important-task-form" action="" method="POST">
          <div class="input-box">
            <input type="text" id="important-task-add" placeholder="Important Task" required>
  
          </div>
          <div class="input-box">
            <input type="text" id="important-task-description" placeholder="Description">
  
          </div>
          <button type="submit" class="add-btn" onclick="addImportantTask(event)">Add</button>
        </form>
      </div>
      <div class="wrapper">
        <h3>Add Normal Task:</h3>
        <form id="normal-task-form" action="" method="POST">
          <div class="input-box">
            <input type="text" id="normal-task-add" placeholder="Normal Task" required>
  
          </div>
          <div class="input-box">
            <input type="text" id="normal-task-description" placeholder="Description">
  
          </div>
          <button type="submit" class="add-btn" onclick="addNormalTask(event)">Add</button>
        </form>
      </div>
    </div>
    <div class="task-list-cointainer">
      <div class="task-list">
        <h3>Important Task 2DO:</h3>
        <div id="important-task-list">
  
        </div>
      </div>
      <div class="task-list">
        <h3>Normal Task 2DO:</h3>
        <div id="normal-task-list">
  
        </div>
      </div>
    </div>
  
  
  
  
    <script>
    
    </script>
  </body>
  
  </html>