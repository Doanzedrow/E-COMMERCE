<?php session_start();

if(isset($_GET['id'])):
    $id = $_GET['id'];
    if(isset($_POST['qty'])):
		
        $_SESSION['cart'][$id] =  $_POST['qty'];
    
    else:

    if(isset($_SESSION['cart'][$id])):
        $_SESSION['cart'][$id]++;
        
		
    else:
        $_SESSION['cart'][$id] = 1;
    endif;
    endif;
endif;
header('location:ViewWishlist.php');