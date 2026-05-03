<?php
session_start();
include("config/db.php");

$result = $conn->query("SELECT * FROM products");

while($row = $result->fetch_assoc()){
?>
    <div>
        <h3><?php echo $row['name']; ?></h3>
        <p>₹<?php echo $row['price']; ?></p>
        
        <a href="cart.php?id=<?php echo $row['id']; ?>">
            Add to Cart
        </a>
    </div>
<?php
}
?>