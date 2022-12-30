<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/protypes.php';
$protype = new protypes;
if(isset($_POST['nametype']))
{
    $name_protype = $_POST['nametype'];
    $protype->InsertProtype($name_protype);
    header("location:protypes.php");
}

?>