<?php 
if(isset($_GET['keyword']))
{
    header('location:searchproduct.php?keyword='.$_GET['keyword'].'&&pages=1');
}
else
{
    header('location:searchproduct.php?keyword='.'&&pages=1');
}
    