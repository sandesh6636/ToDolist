<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>
  <link rel="stylesheet" href="static\css\main.css"/>
</head>

<body>
  <header>
    <div class="container">
      <h1 class="header">Todo List</h1>
      <form action="" method="POST">
        <div class="task-container">
          <input type="text" id="imp-task-add" name="imp-task" placeholder="Important Task">
          <button type="submit">Add</button>
        </div>
        <div class="task-container">
          <input type="text" id="task-add" name="task" placeholder="Task">
          <button type="submit">Add</button>
        </div>
      </form>
    </div>
  </header>
  <section class="task-list">
    <div class="container">
      <h2 class="header">Tasks to Do</h2>
      <div class="task">
        <div class="content">
          <input type="text" class="text" value="A new task" readonly>
        </div>
        <div class="actions">
          <button class="edit">Edit</button>
          <button class="delete">Delete</button>
        </div>
  </section>

</body>

</html>