<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/products.php';
require './app/models/protypes.php';
require './app/models/manufactures .php';
$product = new Product;
$protypes= new protypes;
$manufactures = new Manufactures;

if(isset($_POST['namemanu']))
{
    $namemanu = $_POST['namemanu'];
    $id_manu = $_POST['manu_id'];
    $manufactures->UpdateManufactures($namemanu,$id_manu);   
    header("location:manufactures.php");
}   
if(isset($_POST['type_name']))
{
    $type_name = $_POST['type_name'];
    $type_id = $_POST['type_id'];
    $protypes->UpdateProtypes($type_name,$type_id);   
    header("location:protypes.php");
}   