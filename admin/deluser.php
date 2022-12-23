<?php 
require './Config/database.php';
require './app/models/db.php';
require './app/models/user.php';
$user = new User;

if(isset($_GET['id']))
{
    $user_id = $_GET['id'];
    $user->delUser($user_id);   
    header("location:user.php");
}

