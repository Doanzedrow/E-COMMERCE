<?php session_start();

if(isset($_GET['id'])):
    $id = $_GET['id'];
    
    if(isset($_SESSION['wishlist'][$id])):
        $_SESSION['wishlist'][$id]++;
        
		
    else:
        $_SESSION['wishlist'][$id] = 1;
    endif;
 
endif;
$page = $_GET['page'];
if($page == 'index.php')
{
    header('location:index.php');
}
else if($page == 'productOfprotypes.php')
{
    header('location:'.$page.'?type_id='.$_GET['type_id']);
}
else if($page == 'result.php')
{
    header('location:'.$page."?type_prd=".$_GET['type_prd']."&&keyword=".$_GET['keyword']);
}
else
{
    header('location:'.$page.'?id='.$_GET['id']);
}