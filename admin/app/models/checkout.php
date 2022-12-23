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
    public function delcheckout($id)
    {
 
        $sql = self::$connection->prepare("DELETE FROM `checkout` WHERE `checkout_id`=?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
       
    }
    public function getCheckoutById($c_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `checkout` WHERE `checkout_id`= ?");
        $sql->bind_param("i",$c_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function editcheckout($fName,$lName,$email,$address,$city,$country,$phone,$id,$shipping,$qty_buy,$money,$other_node,$c_id)
    {        
        $sql = self::$connection->prepare("UPDATE `checkout` 
        SET `fName`=?,`lName`=?,`email`=?,`address`=?,`city`=?,`country`=?,`phone`=?,`id`=?,`shiping`=?,
        `qty_buy`=?,`money`=?,`other_node`=? WHERE `checkout_id` =?");
        $sql->bind_param("sssssssiiiisi",$fName,$lName,$email,$address,$city,$country,$phone,$id,$shipping,$qty_buy,$money,$other_node,$c_id);
       return $sql->execute(); //return an object
    }
}