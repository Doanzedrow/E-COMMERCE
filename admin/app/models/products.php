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
    public function getProducts ($page, $perPage)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes where products.menu_id = manufactures.manu_id and products.type_id = protypes.type_id  ORDER BY id DESC LIMIT $fistLink,$perPage");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
    public function ProductById($name,$manu_id,$type_id,$price,$image,$description,$feature,$created_at,$discount,$qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card)
    {
 
        $sql = self::$connection->prepare("INSERT INTO `products` (`name`,`menu_id`,`type_id`,`price`,`image`,`description`,`feature`,`created_at`,`discount`,`qty_sold`,`kichthuocmanhinh`,`chip`,`ram`,`rom`,`pin`,`dophangiai`,`congketnoi`,`congsuat`,`hedieuhanh`,`card`) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissisiissssssssss",$name,$manu_id,$type_id,$price,$image,$description,$feature,$created_at,$discount,$qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card);
        return $sql->execute(); //return an object
       
    }
    public function delproduct($id)
    {
 
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i",$id);
        return $sql->execute(); //return an object
       
    }
    public function editproduct($name,$manu_id,$type_id,$price,$image,$description,$feature,$discount,$qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card,$id)
    {
        if($image != "")
        {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`menu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`discount`=?,`qty_sold`=?,
        `kichthuocmanhinh`=?,`chip`=?,`ram`=?,`rom`=?,`pin`=?,`dophangiai`=?,`congketnoi`=?,`congsuat`=?,`hedieuhanh`=?,`card`=? 
        WHERE `id` =?");
        $sql->bind_param("siiissiiissssssssssi",$name,$manu_id,$type_id,$price,$image,$description,$feature,$discount,
        $qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card,$id);
        }
        else
        {
            $sql = self::$connection->prepare("UPDATE `products` 
            SET `name`=?,`menu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`discount`=?,`qty_sold`=?,`kichthuocmanhinh`=?,`chip`=?,`ram`=?,`rom`=?,`pin`=?,`dophangiai`=?,`congketnoi`=?,`congsuat`=?,`hedieuhanh`=?,`card`=? 
            WHERE `id` =?");
            $sql->bind_param("siiisiiissssssssssi",$name,$manu_id,$type_id,$price,$description,$feature,$discount,$qty_sold,$kichthuocmanhinh,$chip,$ram,$rom,$pin,$dophangiai,$congketnoi,$congsuat,$hedieuhanh,$card,$id);
        }
       return $sql->execute(); //return an object
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
    public function paginate($url, $total,$page, $perPage,$offset)
    {
        if($total <= 0) {
            return "";
        }
        $totalLinks = ceil($total/$perPage);
        if($totalLinks <= 1) {
        return "";
        }
        $from = $page - $offset;
        $to = $page + $offset;
        //$offset quy định số lượng link hiển thị ở 2 bên trang hiện hành
        //$offset = 2 và $page = 5,lúc này thanh phân trang sẽ hiển thị: 3 4 5 6 7
        if($from <= 0) {
        $from = 1;
        $to = $offset * 2;
        }
        if($to > $totalLinks) {
        $to = $totalLinks;
        }       
        $links = array();
        $link = "";
        for ($j = $from; $j <= $to; $j++) {
            
            if($j != $page)
            {
                $link = $link."<li><a href = '$url?pages=$j'> $j </a>";              
            }
            else
            {
                $link = $link."<li class='active'><a href = '$url?pages=$j'> $j </a></li>";
            }           
        }
        return $link; 
    }
    public function getsearchProducts($page, $perPage,$keyword)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes where  products.name like ? and products.menu_id = manufactures.manu_id and products.type_id = protypes.type_id   ORDER BY id DESC LIMIT $fistLink,$perPage");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getsearch($page, $perPage,$keyword)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes where  products.name like ? and products.menu_id = manufactures.manu_id and products.type_id = protypes.type_id   ORDER BY id DESC");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function paginateOfSearch($url, $total,$page, $perPage,$offset,$keyword)
    {
        if($total <= 0) {
            return "";
        }
        $totalLinks = ceil($total/$perPage);
        if($totalLinks <= 1) {
        return "";
        }
        $from = $page - $offset;
        $to = $page + $offset;
        //$offset quy định số lượng link hiển thị ở 2 bên trang hiện hành
        //$offset = 2 và $page = 5,lúc này thanh phân trang sẽ hiển thị: 3 4 5 6 7
        if($from <= 0) {
        $from = 1;
        $to = $offset * 2;
        }
        if($to > $totalLinks) {
        $to = $totalLinks;
        }       
        $links = array();
        $link = "";
        for ($j = $from; $j <= $to; $j++) {
            
            if($j != $page)
            {
                $link = $link."<li><a href = '$url?keyword=$keyword&&pages=$j'> $j </a>";              
            }
            else
            {
                $link = $link."<li class='active'><a href = '$url?keyword=$keyword&&pages=$j'> $j </a>";              
            }
                
        }
        return $link; 
    }

}