<?php
require "config.php";
require "models/db.php";
require "models/product.php";
//require "models/manufacture.php";
//require "models/protype.php";
$product = new Product;
//$manu = new Manufacture;
//$type = new Protype;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $imag = $_FILES['image']['name'];
    //xu ly them san pham
    $product->addProduct($name, $manu_id, $type_id, $price, $image, $desc);
    //xu ly upload

    if($product->addProduct($name, $manu_id, $type_id, $price, $image, $desc)){
        echo "Them thanh cong";
    }
    else{
        echo "That bai";
    }
    $target_dir ="../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES['image']['name'], $target_file);
    header('location:product.php');

}
else{
    echo 0;
}