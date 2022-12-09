<?php
class Product extends Db{
    public function getAllProducts ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes where products.menu_id = manufactures.manu_id and products.type_id = protypes.type_id ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
    public function ProductById($name,$manu_id,$type_id,$price,$image,$description,$feature,$discount,$qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card)
    {
 
        $sql = self::$connection->prepare("INSERT INTO `products` (`name`,`menu_id`,`type_id`,`price`,`image`,`description`,`feature`,`discount`,`qty_sold`,`kichthuocmanhinh`,`chip`,`ram`,`rom`,`pin`,`dophangiai`,`congketnoi`,`congsuat`,`hedieuhanh`,`card`) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissiiissssssssss",$name,$manu_id,$type_id,$price,$image,$description,$feature,$discount,$qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card);
        return $sql->execute(); //return an object
       
    }
    public function delproduct($id)
    {
 
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
       
    }

}