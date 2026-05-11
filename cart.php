<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Your Cart</h2>

<div id="cartItems"></div>
<h3 id="total"></h3>

<a href="checkout.php">Checkout</a>

<script src="script.js"></script>
<script>
let total = 0;

cart.forEach((item, index) => {
  document.getElementById("cartItems").innerHTML += `
    <div class="cart-item">
      <p>${item.name} - ₹${item.price}</p>
      <p>Qty: ${item.qty}</p>

      <button onclick="changeQty(${index}, 1)">+</button>
      <button onclick="changeQty(${index}, -1)">-</button>
      <button onclick="removeItem(${index})">Remove</button>
    </div>
  `;

  total += item.price * item.qty;
});

document.getElementById("total").innerText = "Total: ₹" + total;
</script>

</body>
</html>