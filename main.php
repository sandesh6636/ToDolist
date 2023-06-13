<?php
session_start();
require_once("conn.php");
$msg="";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location:login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId=$_SESSION['id'];
    $importantTask= $_POST['importantTask'];
    $importantDec = $_POST['importantDec'];
    $normalTask = $_POST['normalTask'];
    $normalDec = $_POST['normalDec'];
    $qry="INSERT INTO tasks(userId,impTaskTittle,impTaskDec,norTaskTittle,norTaskDec) VALUES('$userId','$importantTask','$importantDec','$normalTask','$noramlDec')";
    $res=mysqli_query($conn,$qry);
    if($res){
    
      $msg= '<div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>Task Added sucessfully</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else{
      
      $msg= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Task cant Added sucessfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
     
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<link rel="stylesheet" href="static\css\Main.css">

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
    <div class="welcom-section">
        <!-- Welcome section content here -->
    </div>
    <div class="add-task-cointainer">
        <div class="wrapper">
            <h3>Add Important Task:</h3>

            <form id="important-task-form" action="" method="POST">
                <div class="input-box">
                    <input type="text" id="important-task-add" name="importantTask" placeholder="Important Task"
                        required>

                </div>
                <div class="input-box">
                    <input type="text" id="important-task-description" name="importantDes" placeholder="Description">

                </div>
                <button type="submit" class="add-btn" onclick="addImportantTask(event)">Add</button>

        </div>
        <div class="wrapper">
            <h3>Add Normal Task:</h3>

            <div class="input-box">
                <input type="text" id="normal-task-add" name="normalTask" placeholder="Normal Task" required>

            </div>
            <div class="input-box">
                <input type="text" id="normal-task-description" name="normalDes" placeholder="Description">

            </div>
            <button type="submit" class="add-btn" onclick="addNormalTask(event)">Add</button>
            <?php
           echo "$msg";
             ?>
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

    <script src="static\js\main.js"></script>
</body>

</html>