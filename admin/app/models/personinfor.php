<?php
class Personinfor extends Db
{
    public function getPersonInfor ()
    {
        $sql = self::$connection->prepare("SELECT * FROM personinfor ORDER BY id_user DESC limit 1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getPersoninforById ($id_user)
    {
        $sql = self::$connection->prepare("SELECT * FROM personinfor where `id_user` = ?");
        $sql->bind_param('i',$id_user);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function insertPersioninfor ($fullname,$ngaysinh,$sdt,$email,$phai,$id_user)
    {
        $sql = self::$connection->prepare("INSERT INTO personinfor (`fullname`,`ngaysinh`,`sdt`,`email`,`phai`,`id_user`) values (?,?,?,?,?,?)");  
        $sql->bind_param('sssssi',$fullname,$ngaysinh,$sdt,$email,$phai,$id_user);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result();
        return $items; //return an array
    }
}