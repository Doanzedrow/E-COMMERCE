<?php
class review extends Db
{
    public function getAllreview()
    {
        $sql = self::$connection->prepare("SELECT review.*,user.username,products.name,products.image FROM `review`,`user`,`products` WHERE `review`.`id_user` = `user`.`id_user` and `review`.`id_product` = `products`.`id` ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function Insertreview($id_product, $coment,$id_user,$start,$created_at)
    {
        $sql = self::$connection->prepare("INSERT INTO `review` (`id_product`, `coment`,`id_user`,`start`,`created_at`) VALUES (?,?,?,?,?)");
        $sql->bind_param("isiis",$id_product, $coment,$id_user,$start,$created_at);
        return $sql->execute(); //return an object
    }
    public function getProtypeByIdPage($page, $perPage)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT review.*,user.username FROM `review`,`user` WHERE `review`.`id_user` = `user`.`id_user`  LIMIT $fistLink,$perPage ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function delreview($id)
    {
 
        $sql = self::$connection->prepare("DELETE FROM `review` WHERE `id_review`=?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
       
    }
}