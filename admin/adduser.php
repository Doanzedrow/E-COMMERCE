<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/user.php';
$user = new User;
if(isset($_POST['user']))
{
    $user_name = $_POST['user'];
    $pass = $_POST['password'];
    $user->insertIntoUser($user_name,$pass);
    header("location:user.php");
}

?>