<?php
@session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocery";




// Create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if ($conn) {
	//echo "Database Connected";
}
else{
	echo "Database not Connected.";
}
?>