<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/user.php';
$user = new User;

if(isset($_POST['id_user']))
{
    $id = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user->EditUser($id,$username,$password);   
    header("location:user.php");
}    