// JavaScript code here
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
//   event.preventDefault();

//   if (importantTaskCount >= 2) {
//     // Maximum number of important tasks reached
//     alert('You can only add 2 important tasks.');
//     return;
//   }

//   // Get input values
//   var taskName = document.getElementById('important-task-add').value;
//   var taskDescription = document.getElementById('important-task-description').value;

//   // Create a new task element
//   var taskElement = createTaskElement(taskName, taskDescription);

//   // Append the task element to the important task list
//   var taskList = document.getElementById('important-task-list');
//   taskList.appendChild(taskElement);
//   var horizontalRule = document.createElement('hr');
//   taskList.appendChild(horizontalRule);
//   // Clear input fields
//   document.getElementById('important-task-add').value = '';
//   document.getElementById('important-task-description').value = '';

//   importantTaskCount++; // Increment the important task count
}

// Function to add a normal task
function addNormalTask(event) {
//   event.preventDefault();

//   if (normalTaskCount >= 5) {
//     // Maximum number of normal tasks reached
//     alert('You can only add 5 normal tasks.');
//     return;
//   }

//   // Get input values
//   var taskName = document.getElementById('normal-task-add').value;
//   var taskDescription = document.getElementById('normal-task-description').value;

//   // Create a new task element
//   var taskElement = createTaskElement(taskName, taskDescription);

//   // Append the task element to the normal task list
//   var taskList = document.getElementById('normal-task-list');
//   taskList.appendChild(taskElement);
//   var horizontalRule = document.createElement('hr');
//   taskList.appendChild(horizontalRule);
//   // Clear input fields
//   document.getElementById('normal-task-add').value = '';
//   document.getElementById('normal-task-description').value = '';

//   normalTaskCount++; // Increment the normal task count


}