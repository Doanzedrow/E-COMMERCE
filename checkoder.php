<?php
session_start();
require "./Config/database.php";
require "./app/models/db.php";
	require "./app/models/checkout.php";
    require "./app/models/products.php";
	$checkout = new CheckOut;
    $product = new Product;
	$getAllProducts = $product->getAllProducts(); 
	 $fName = $_POST['first-name'];
	 $lName = $_POST['last-name'];
	 $email = $_POST['email'];
	 $address = $_POST['address'];
	 $city = $_POST['city'];
	 $country = $_POST['country'];
	 $phone = $_POST['tel'];
     $note = $_POST['note'];
     foreach($_SESSION['cart'] as $k => $value){
        foreach($getAllProducts as $p){
            if($p['id' ]== $k)
            {
                $pri = (int)(($p['price'] - $p['price'] * $p['discount'] /100) *$value);
                $insertCheckout = $checkout->insertCheckout($fName,$lName,$email,$address,$city, $country,$phone,$k,0,$value,$pri, $note);
                header('location:../blank.php');
            }
        }       
     }