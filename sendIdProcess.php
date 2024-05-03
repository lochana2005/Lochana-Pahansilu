<?php
session_start();
include "connection.php";

$email = $_SESSION["u"]["email"];
$pid = $_GET["id"];

$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."' AND `user_email`='".$email."'");
$product_num = $product_rs->num_rows;

if($product_num == 1){
    $product_data = $product_rs->fetch_assoc();
    $_SESSION["p"] = $product_data;

    echo ("Success");
}else{
    echo ("Something went wrong. Please try again later.");
}

?>