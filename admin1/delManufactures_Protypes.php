<?php 
require './Config/database.php';
require './app/models/db.php';
require './app/models/products.php';
require './app/models/protypes.php';
require './app/models/manufactures .php';
$product = new Product;
$protypes= new protypes;
$manufactures = new Manufactures;

if(isset($_GET['manu_id']))
{
    $idmanu = $_GET['manu_id'];
    $manufactures->DelManufactures($idmanu);   
    header("location:manufactures.php");
}

if(isset($_GET['type_id']))
{
    $type_id = $_GET['type_id'];
    $protypes->DelProtype($type_id);   
    header("location:protypes.php");
}