<?php
include 'db.php';
$location = $_POST['location'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$cart = $_POST['cartData'];

$data = json_decode($cart, true);

$total = 0;
$text = "";

foreach ($data as $item) {
  $line = $item['name'] . " x" . $item['qty'] . " = ₹" . ($item['price'] * $item['qty']);
  $text .= $line . "%0A";
  $total += $item['price'] * $item['qty'];
}

$sql = "INSERT INTO orders (name, phone, products, total) 
VALUES ('$name', '$phone', '$text', '$total')";
$conn->query($sql);

// WhatsApp message
$message = "🛒 *New Order* %0A%0A";
$message .= "👤 Name: $name %0A";
$message .= "📞 Phone: $phone %0A%0A";
$message .= "📦 Items:%0A$text%0A";
$message .= "💰 Total: ₹$total";
$message .= "%0A📍 Location: $location";

// redirect
header("Location: success.php?msg=$message");

?>