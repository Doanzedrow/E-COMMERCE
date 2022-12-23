<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/checkout.php';
$checkout = new CheckOut;
if(isset($_POST['checkout_id']))
{
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $shiping = $_POST['shiping'];
    $qty_buy = $_POST['qty_buy'];
    $money = $_POST['money'];
    $other_node = $_POST['other_node'];
    $checkout_id = $_POST['checkout_id'];
   
   
    //xu ly them
    $checkout->editcheckout($fName,$lName,$email,$address,$city,$country,$phone,$id,$shiping,$qty_buy,$money,$other_node,$checkout_id);
   
    header("location:checkout.php");
}