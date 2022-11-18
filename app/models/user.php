<?php
class User extends Db
{
    public function getUser ()
    {
        $sql = self::$connection->prepare("SELECT * FROM user ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function insertIntoUser ($username,$password)
    {
        $sql = self::$connection->prepare("INSERT INTO user values (?,?)");
        $sql->bind_param('ss',$username,$password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}