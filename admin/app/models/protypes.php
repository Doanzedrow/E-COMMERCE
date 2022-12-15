<?php
class protypes extends Db{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * FROM protypes ORDER BY type_id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function InsertProtype($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes` (`type_id`, `type_name`) values (null,?)");
        $sql->bind_param("s",$name);
        return $sql->execute(); //return an object
       
    }
    public function DelProtype($type_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `protypes`.`type_id` = ?");
        $sql->bind_param("i",$type_id);
        return $sql->execute(); //return an object
    }
    public function UpdateProtypes($type_name,$type_id)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name` = ? WHERE `protypes`.`type_id` = ?");
        $sql->bind_param("si",$type_name,$type_id);
        return $sql->execute(); //return an object
    }
}