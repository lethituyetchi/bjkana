<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;


if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $feature = $_POST['feature'];
    $image = $_FILES['image']['name'];
    $desc =$_POST['desc'];
  
    //them sp vao bang product
    $product->addProduct($name,$manu_id, $type_id,$price, $feature, $desc, $image );

    //upload hinh
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
header('location:products.php');
?>