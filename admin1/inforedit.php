<?php
require './Config/database.php';
require './app/models/db.php';
require './app/models/personinfor.php';
$personinfor = new Personinfor;

if(isset($_POST['id_user']))
{
    $id_user = $_POST['id_user'];
    $fullname = $_POST['fullname'];
    $ngaysinh = $_POST['ngaysinh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $phai = isset($_POST['phai'])?1:0;
    $personinfor->EditInfor($fullname,$ngaysinh,$sdt,$email,$phai,$id_user);   
    header("location:personinfor.php");
}    