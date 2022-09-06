<?php
$servername = 'localhost';
$username = 'root';
$password = "";
$databasename = "hospital database";

//Create Connection
$conn = new mysqli($servername,$username,$password,$databasename);

//Checking Connection
if(!$conn = mysqli_connect($servername,$username,$password,$databasename))
{

	die("failed to connect!");
}
?>