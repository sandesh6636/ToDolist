<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  
        canvas {
            max-width: 600px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
<header>
        <!-- Header content here -->
        <h2 class="logo"><a href="home.php">2Do List</a></h2>
        <nav class="navigation">
            
          <a href="crud.php">Add Tasks</a>
          <a href="profile.php">Profile</a>
          <button type="submit" class="btn-login">
              <a href="logout.php">Logout</a>
            </button>
        </nav>

    </header>
    <div style="text-align: center;">
        <h2>Task Priorities</h2>
        <canvas id="taskChart"></canvas>
    </div>

    <?php
    session_start();
    require_once("conn.php");
    // Retrieve task counts for each priority
    $userId = $_SESSION['id'];

    $sql = "SELECT priority, COUNT(*) as count FROM tasks WHERE userId = '$userId' GROUP BY priority";
    $result = $conn->query($sql);

    // Prepare data for the chart
    $labels = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['priority'];
        $data[] = $row['count'];
    }

    // Convert data arrays to JSON format for chart.js
    $labelsJSON = json_encode($labels);
    $dataJSON = json_encode($data);
    ?>

    <script>
        // Retrieve data from PHP variables
        var labels = <?php echo $labelsJSON; ?>;
        var data = <?php echo $dataJSON; ?>;

        // Create the chart
        var ctx = document.getElementById('taskChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Task Count',
                    data: data,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                }
            }
        });
    </script>


</body>

</html>
