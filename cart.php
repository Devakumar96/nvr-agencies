<?php
session_start();

if(isset($_GET['id'])){
    $product_id = $_GET['id'];

    // Create cart if not exists
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    // Add product to cart
    $_SESSION['cart'][] = $product_id;

    echo "Product added to cart <br>";
}
?>