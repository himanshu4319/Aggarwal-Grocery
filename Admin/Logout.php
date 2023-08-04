<?php 
session_start();
unset ($_SESSION['Admin_Login']) ;
unset ($_SESSION['Admin_username']);
header('location:Admin_Login.php');
die();

?>