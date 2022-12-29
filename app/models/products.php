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
    public function getsearchProducts($page, $perPage,$keyword)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name`  LIKE ? LIMIT $fistLink,$perPage ");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProtypeByIdPage($page, $perPage,$id)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? LIMIT $fistLink,$perPage ");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getManuByIdPage($page, $perPage,$type_id,$manu_id)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? and `menu_id` = ? LIMIT $fistLink,$perPage ");
        $sql->bind_param("ii",$type_id,$manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByIdPage($id,$page, $perPage)
    {
        $fistLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ? LIMIT $fistLink,$perPage ");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function paginateOfWish($url, $total,$page, $perPage,$offset)
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
            
            if($j != $_GET['pages'])
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
    public function paginateOftype($url, $total,$page, $perPage,$offset,$id)
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
                $link = $link."<li><a href = '$url?type_id=$id&&pages=$j'> $j </a>";              
            }
            else
            {
                $link = $link."<li class='active'><a href = '$url?type_id=$id&&pages=$j'> $j </a></li>";
            }           
        }
        return $link; 
    }
    public function paginateOfmanu($url, $total,$page, $perPage,$offset,$id,$manu)
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
                $link = $link."<li><a href = '$url?type_id=$id&&pages=$j&&manu_id=$manu'> $j </a>";              
            }
            else
            {
                $link = $link."<li class='active'><a href = '$url?type_id=$id&&pages=$j&&manu_id=$manu'> $j </a></li>";
            }           
        }
        return $link; 
    }
    public function paginateOfSearch($url, $total,$page, $perPage,$offset,$keyword,$type_prd)
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
            
            if($j != $_GET['pages'])
            {
                $link = $link."<li><a href = '$url?type_prd=$type_prd&&keyword=$keyword&&pages=$j'> $j </a>";              
            }
            else
            {
                $link = $link."<li class='active'><a href = '$url?type_prd=$type_prd&&keyword=$keyword&&pages=$j'> $j </a></li>";
            }           
        }
        return $link; 
    }

}