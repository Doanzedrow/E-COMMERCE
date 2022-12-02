<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/products.php';
$product = new Product;
if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $manu_id = $_POST['manu_id'];
    $type_id = $_POST['type_id'];
    $feature = isset($_POST['feature'])?1:0;
    //xu ly them
    $product->ProductById($name,$manu_id,$type_id,$price,$image,$description,$feature);
    //xu ly upload
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    header("location:products.php");
}