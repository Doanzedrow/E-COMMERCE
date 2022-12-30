<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/products.php';
$product = new Product;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $product->delproduct($id);
    header('location:products.php?pages=1');
}
?>