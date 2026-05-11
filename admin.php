<?php
include 'db.php';

$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");

while($row = $result->fetch_assoc()) {
  echo "<div style='background:white;padding:10px;margin:10px'>";
  echo "<b>Name:</b> " . $row['name'] . "<br>";
  echo "<b>Phone:</b> " . $row['phone'] . "<br>";
  echo "<b>Products:</b><br>" . nl2br($row['products']) . "<br>";
  echo "<b>Total:</b> ₹" . $row['total'] . "<br>";
  echo "</div>";
}
?>