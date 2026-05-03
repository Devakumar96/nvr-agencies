<?php
include("../config/db.php");

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$product_id = 1; // example
$qty = 1;

$sql = "INSERT INTO orders (customer_name, phone, address, product_id, quantity)
VALUES ('$name','$phone','$address','$product_id','$qty')";

$conn->query($sql);

echo "Order placed!";
?>