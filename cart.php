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
$page = $_GET['page'];
if($page == 'index.php')
{
    header('location:index.php');
}
else if($page == 'productOfprotypes.php')
{
    header('location:'.$page.'?type_id='.$_GET['type_id']."&&pages=".$_GET['pages']);
}
else if($page == 'result.php')
{
    header('location:'.$page."?type_prd=".$_GET['type_prd']."&&keyword=".$_GET['keyword']."&&pages=".$_GET['pages']);
}
else
{
    header('location:'.$page.'?id='.$_GET['id']);
}

