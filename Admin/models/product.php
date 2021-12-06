<?php
class Product extends Db
{
    public function getAllProducts()
    {
          $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes where products.manu_id=manufactures.manu_id
          and products.type_id=protypes.type_id ORDER BY `id` DESC");
          $sql->execute(); //return an object
          $items = array();
          $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
          return $items; //return an array
    }
    public function addProduct($name,$manu_id, $type_id,$price, $feature, $desc, $image )
    {
         $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `feature`,`description`,`image`) VALUES(?,?,?,?,?,?,?)");
         $sql->bind_param("siiiiss",$name,$manu_id, $type_id,$price, $feature, $desc, $image );
         return $sql->execute(); //return an object
         
    }
    public function delProduct($id)
    {
         $sql = self::$connection->prepare("DELETE FROM `products` WHERE id=?");
         $sql->bind_param("i",$id);
         return $sql->execute(); //return an object
         
    }
    public function editProduct($name,$image,$price,$manu_id,$type_id,$desc,$feature,$id)
    {
         $sql = self::$connection->prepare("UPDATE `products` set `name`=?, `image=?`, `price`=?, `manu_id`, `type_id`,`description`,`feature` where `id`=?) VALUES(?,?,?,?,?,?,?)" );
         $sql->bind_param("ssiiisii",$name,$image,$price,$manu_id,$type_id,$desc,$feature,$id);
         return $sql->execute(); //return an object
         
    }
}
?>