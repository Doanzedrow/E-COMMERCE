<?php 
if(isset($_GET['keyword']))
{
    header('location:result.php?type_prd='.$_GET['type_prd'].'&keyword='.$_GET['keyword'].'&&pages=1');
}
else
{
    header('location:result.php?type_prd='.$_GET['type_prd'].'&keyword='.'&&pages=1');
}
    
