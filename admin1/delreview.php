<?php
require './Config/database.php';
require './app/models/db.php';
include './app/models/review.php'; 
$review = new review;
if(isset($_GET['id_review'])){
    $id = $_GET['id_review'];
    $review->delreview($id);
    header('location:review.php');
}
?>