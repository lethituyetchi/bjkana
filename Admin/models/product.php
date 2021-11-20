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
    
}
?>