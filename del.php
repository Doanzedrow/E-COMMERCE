<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);  
}
else{
    unset($_SESSION['cart']);
}
header('location:index.php');
//header('location:index.php');