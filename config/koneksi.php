<?php
$host="localhost";
$user="root";
$pass="";
$db="blog";

$con = mysqli_connect($host,$user,$pass,$db);

if(!$con){
    die("Error ".mysqli_connect_error());
}

?>