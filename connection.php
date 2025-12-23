<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "website";

$con = new mysqli($host,$user,$pass,$db);

if($con->connect_error){
    die("connection failed".$con->connect_error)

}

?>