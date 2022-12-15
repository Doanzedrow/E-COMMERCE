<?php
class Manufactures extends Db{
    public function getAllManufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures ORDER BY manu_id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function InsertManufactures($manu)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES (NULL,?)");
        $sql->bind_param("s",$manu);
        return $sql->execute(); //return an object
    }
    public function DelManufactures($manu_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manufactures`.`manu_id` = ?");
        $sql->bind_param("i",$manu_id);
        return $sql->execute(); //return an object
    }
    public function UpdateManufactures($manu_name,$manu_id)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name` = ? WHERE `manufactures`.`manu_id` = ?");
        $sql->bind_param("si",$manu_name,$manu_id);
        return $sql->execute(); //return an object
    }

}