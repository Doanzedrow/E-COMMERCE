<?php
class User extends Db
{
    public function getUser ()
    {
        $sql = self::$connection->prepare("SELECT * FROM user ORDER BY id_user DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getIdUser($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM user where `id_user` = ? ");
        $sql->bind_param('i',$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function insertIntoUser ($username,$password)
    {
        $sql = self::$connection->prepare("INSERT INTO user (`username`,`password`) values (?,?)");
        $password = md5($password);
        $sql->bind_param('ss',$username,$password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result();
        return $items; //return an array
    }
    public function checkLogin ($username,$password)
    {
        $sql = self::$connection->prepare("SELECT * From user where `username`=? and `password`=?");
        $password = md5($password);
        $sql->bind_param('ss',$username,$password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->num_rows;
        if($items == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function delUser($id)
    {
 
        $sql = self::$connection->prepare("DELETE FROM `user` WHERE `id_user`=?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
       
    }
    public function EditUser($id_user,$user,$pass)
    {
        $sql = self::$connection->prepare("UPDATE `user` SET `username` = ?,`password`=? WHERE`id_user` = ?");
        $sql->bind_param("ssi",$user,$pass,$id_user);
        return $sql->execute(); //return an object
    }
}