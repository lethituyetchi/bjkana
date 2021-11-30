<?php
class Product extends Db
{
    public function getAllProducts()
    {
          $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes where products.manu_id=manufactures.manu_id
          and products.type_id=protypes.type_id");
          $sql->execute(); //return an object
          $items = array();
          $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
          return $items; //return an array
    }
    public function addProduct($name, $manu_id, $type_id, $price, $image, $desc){
        $sql = self::$connection->prepare("INSERT into `product`(`name`, `manu_id`, `type_id`, `price`, `image`, `descript`)
        values (?,?,?,?,?,?)");
        $sql->bind_param("siiiss", $name, $manu_id, $type_id, $price, $image, $desc);
        return $sql->execute()();
    }
    public function delProduct($id){
        $sql = self::$connection->prepare("DELETE from `products` where `id`=?")
        $sql ->bind_param("i", $id);
        return $sql->execute()();
    }
}
?>