<?php
class Product extends Db{
    public function getAllProducts ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllNewProducts ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1 ORDER BY created_at DESC Limit 5,10");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllTopSellingProducts ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1 && qty_sold >= 20");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get5TopSellingProducts ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1 && qty_sold >= 20 ORDER BY created_at DESC Limit 5");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProtypeById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get3HotTop6Products ()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE feature = 1 ORDER BY created_at DESC Limit 3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    ///Tìm kiếm
    public function searchProducts($keyword)
    {
        //Tim kiem
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name`  LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}