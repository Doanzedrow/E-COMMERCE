<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/checkout.php';
$checkout = new CheckOut;
if(isset($_GET['checkout_id'])){
    $id = $_GET['checkout_id'];
    $checkout->delcheckout($id);
    header('location:checkout.php');
}
?>