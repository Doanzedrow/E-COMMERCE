<?php 
session_start();
unset($_SESSION['admin']);
header('location:..\admin1\loginadmin.php');
?>