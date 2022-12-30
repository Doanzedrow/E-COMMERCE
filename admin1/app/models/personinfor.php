<?php
class Personinfor extends Db
{
    public function getPersonInfor ()
    {
        $sql = self::$connection->prepare("SELECT * FROM personinfor,user where personinfor.id_user=user.id_user");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getPersoninforById($id_user)
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
    public function delper($id)
    {
 
        $sql = self::$connection->prepare("DELETE FROM `personinfor` WHERE `id_user`=?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
       
    }
    public function EditInfor($fullname,$ngaysinh,$sdt,$email,$phai,$id_person)
    {
        $sql = self::$connection->prepare("UPDATE `personinfor` SET `fullname` = ?,`ngaysinh`=? ,`sdt` = ?,`email`=? ,`phai` = ? WHERE`id_user` = ?");
        $sql->bind_param("ssisii",$fullname,$ngaysinh,$sdt,$email,$phai,$id_person);
        return $sql->execute(); //return an object
    }
}