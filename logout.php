<?php 
session_start();
unset ($_SESSION['SignIn']) ;
unset ($_SESSION['Email']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
header('location:SignIn.php');
die();

?>