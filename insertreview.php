<?php
session_start();
require "./Config/database.php";
require "./app/models/db.php";
require "./app/models/review.php";
$review = new review;

$coment = $_POST['coment'];
$start = $_POST['rating'];
$id_pro = $_GET['id'];
$created_at= date("Y-m-d");
$id_user = $_SESSION['user'];
$Insertreview = $review->Insertreview($id_pro,$coment,$id_user,$start,$created_at);
header('location:product.php?id='.$id_pro);