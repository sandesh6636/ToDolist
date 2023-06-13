<?php
$insert = false;
$update = false;
$delete = false;

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

$userId = $_SESSION["id"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "todolist";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $taskId = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `tasks` WHERE `id` = ? AND `userId` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $taskId, $userId);
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        echo "Error deleting task: " . mysqli_error($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['taskIdEdit'])) {
        $taskId = $_POST["taskIdEdit"];
        $taskName = $_POST["taskNameEdit"];
        $taskDescription = $_POST["taskDescriptionEdit"];

        $sql = "UPDATE `tasks` SET `taskName` = ?, `taskDescription` = ? WHERE `id` = ? AND `userId` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssii", $taskName, $taskDescription, $taskId, $userId);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $update = true;
        } else {
            echo "Error updating task: " . mysqli_error($conn);
        }
    } else {
        $taskName = $_POST["taskName"];
        $taskDescription = $_POST["taskDescription"];
        $priority = $_POST["priority"];
       

        $sql = "INSERT INTO `tasks` (`userId`, `taskName`, `taskDescription`, `priority`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "issi", $taskName, $taskDescription, $priority, $userId);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $insert = true;
        } else {
            echo "Error inserting task: " . mysqli_error($conn);
        }
    }
}
?>

<!-- Rest of your HTML code -->



<!-- Rest of your HTML code -->



<!-- Rest of your HTML code -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>iNotes - Notes taking made easy</title>

</head>

<body>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Task</h5>
                 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="taskIdEdit" id="taskIdEdit">
                        <div class="form-group">
                            <label for="taskNameEdit">Task Name</label>
                            <input type="text" class="form-control" id="taskNameEdit" name="taskNameEdit">
                        </div>
                        <div class="form-group">
                            <label for="taskDescriptionEdit">Task Description</label>
                            <textarea class="form-control" id="taskDescriptionEdit" name="taskDescriptionEdit"
                                rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your task has been added successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>";
    }

    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your task has been updated successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>";
    }

    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your task has been deleted successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>";
    }
    ?>

    <div class="container my-4">
        <h2>Add a Task</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="taskName">Task Name</label>
                <input type="text" class="form-control" id="taskName" name="taskName" required>
            </div>
            <div class="form-group">
                <label for="taskDescription">Task Description</label>
                <textarea class="form-control" id="taskDescription" name="taskDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
    <label for="priority">Priority</label>
    <select class="form-control" id="priority" name="priority" required>
        <option value="Low">Normal</option>
        <option value="High">Important</option>
    </select>
</div>

            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>

    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Task Name</th>
                    <th scope="col">Task Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
               $sql = "SELECT * FROM `tasks` WHERE `userId` = '$userId'";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                <th scope='row'>" . $row['taskName'] . "</th>
                <td>" . $row['taskDescription'] . "</td>
                <td>" . $row['priority'] . "</td>
                <td>
                    <button class='edit btn btn-sm btn-primary' id=" . $row['id'] . ">Edit</button>
                    <button class='delete btn btn-sm btn-danger' id=d" . $row['id'] . ">Delete</button>
                </td>
            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poIv5t7Zvi832MlMkFSc0x2p46BI8j5y0peCfBhA6k34sGh9M2n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-oTQPeNi2myd9nK9Z4Pn7r8qD1irA4EmV+fLIZHr4WZuMlRfyitklD7Iqx0MkmGTD"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    // Edit Task
    let editBtns = document.getElementsByClassName('edit');
    Array.from(editBtns).forEach((btn) => {
        btn.addEventListener('click', (e) => {
            let tr = e.target.parentNode.parentNode;
            let taskName = tr.getElementsByTagName('th')[0].innerText;
            let taskDescription = tr.getElementsByTagName('td')[0].innerText;
            let taskId = e.target.id;
            document.getElementById('taskNameEdit').value = taskName;
            document.getElementById('taskDescriptionEdit').value = taskDescription;
            document.getElementById('taskIdEdit').value = taskId;
            $('#editModal').modal('toggle');
        });
    });

    // Delete Task
    let deleteBtns = document.getElementsByClassName('delete');
    Array.from(deleteBtns).forEach((btn) => {
        btn.addEventListener('click', (e) => {
            let taskId = e.target.id.substr(1);
            if (confirm("Are you sure you want to delete this task?")) {
                window.location = `/main2.php?delete=${taskId}`;
            }
        });
    });
</script>

</body>

</html>
