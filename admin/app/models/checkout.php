<?php
class CheckOut extends Db{
    public function insertCheckout ($fName,$lName,$email,$address,$city,$country,$phone,$id,$shipping,$qty_buy,$money,$other_node)
    {
        $sql = self::$connection->prepare("INSERT INTO checkout (`fName`,`lName`,`email`,`address`,`city`,`country`,`phone`,`id`,`shiping`,`qty_buy`,`money`,`other_node`) values (?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param('sssssssiiiis',$fName,$lName,$email,$address,$city,$country,$phone,$id,$shipping,$qty_buy,$money,$other_node);
        //var_dump("INSERT INTO checkout (`fName`,`lName`,`email`,`address`,`city`,`country`,`phone`,`id`,`shiping`,`qty_buy`,`money`,`other_node`) values ('$fName','$lName','$email','$address','$city','$country','$phone',$id,$shipping,$qty_buy,$money,'$other_node')"); die();
       return $sql->execute(); //return an object
        
    }
    public function getAllCheckout()
    {
        $sql = self::$connection->prepare("SELECT * FROM checkout,products where checkout.id = products.id ORDER BY checkout_id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}