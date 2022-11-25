<?php
class CheckOut extends Db{
    public function insertCheckout ($fName,$lName,$email,$address,$city,$country,$phone,$id,$shipping,$qty_buy,$money,$other_node)
    {
        $sql = self::$connection->prepare("INSERT INTO checkout (`fName`,`lName`,`email`,`address`,`city`,`country`,`phone`,`id`,`shipping`,`qty_buy`,`money`,`other_node`) values (?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param('sssssssiiiis',$fName,$lName,$email,$address,$city,$country,$phone,$id,$shipping,$qty_buy,$money,$other_node);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result();
        return $items; //return an array
    }
}