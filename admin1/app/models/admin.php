<?php
class Admin extends Db
{
    public function getAdmin ()
    {
        $sql = self::$connection->prepare("SELECT * FROM `admin` ORDER BY id_admin DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAdminid ($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `admin` where id_admin = ?  ORDER BY id_admin DESC");
        $sql->bind_param('i',$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function checkLogin ($username,$password)
    {
        $sql = self::$connection->prepare("SELECT * From `admin` where `account_admin`=? and `password_admin`=?");
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
}
?>