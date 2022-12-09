<?php
include './Config/database.php';
include './app/models/db.php';
include './app/models/manufactures .php'; 
$manufacture = new Manufactures;
if(isset($_POST['namemanu']))
{
    $manu_name = $_POST['namemanu'];
    $manufacture->InsertManufactures($manu_name);
    header("location:manufactures.php");
}
?>