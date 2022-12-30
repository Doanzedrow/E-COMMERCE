<?php 
require './Config/database.php';
require './app/models/db.php';
require './app/models/personinfor.php';
$pers = new Personinfor;

if(isset($_GET['id']))
{
    $id_per = $_GET['id'];
    $pers->delper($id_per);   
   header("location:personinfo.php");
}
