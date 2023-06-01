<?php
$host="localhost";
$port="3307";
$username="root";
$password="";
$database="todolist";
  $conn=mysqli_connect($host.":".$port,$username,$password,$database);
  if ($conn){
    echo "connected";
  }
 ?>