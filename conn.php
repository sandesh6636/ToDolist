<?php
// $host="localhost";
// $port="3307";
// $username="root";
// $password="";
// $database="todolist";
define('host',"localhost");
define('port',"3306");
define('username',"root");
define('password',"");
define('database',"todolist");

  $conn=mysqli_connect(host.":".port,username,password,database);
  // if ($conn){
  //   echo "connected";
  // }
 ?>