<?php
session_start();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['wishlist'][$id]);  
}
else{
    unset($_SESSION['wishlist']);
}
header('location:ViewWishlist.php');
//header('location:index.php');