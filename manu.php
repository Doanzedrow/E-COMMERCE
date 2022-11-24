<?php
if(isset($_GET['type_id']))
{
    $id = $_GET['type_id'];
}
$thuonghieu = array();
foreach($_POST['thuonghieu'] as $th)
{
    header('location:./productOfManu.php?type_id='.$id.'&&pages=1&&manu='.$th);
}
