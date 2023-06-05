<?php
session_start();
require_once("routes.php");
$path=$_SERVER["REQUEST_URI"];
if(strlen($path)>1 && substr($path, -1)=="/"){
    $path=substr($path,0,strlen($path)-1);

}
$controller=$route[$path];
require_once("controller/".$controller);

?>