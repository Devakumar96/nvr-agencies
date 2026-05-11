<!DOCTYPE html>
<html>
<body>

<h2>Checkout</h2>

<form action="place_order.php" method="POST">
  <input type="text" name="name" placeholder="Your Name" required><br><br>
  <input type="text" name="phone" placeholder="Phone Number" required><br><br>

  <input type="hidden" name="cartData" id="cartData">

  <p><b>Payment:</b> Cash on Delivery</p>
  <button type="button" onclick="getLocation()">Get My Location</button>

<input type="hidden" name="location" id="location">

  <button type="submit">Place Order</button>
</form>

<script>
document.getElementById("cartData").value = localStorage.getItem("cart");
</script>
<script src="script.js"></script>
<script>
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      let lat = position.coords.latitude;
      let lng = position.coords.longitude;

      let mapsLink = `https://www.google.com/maps?q=${lat},${lng}`;
      document.getElementById("location").value = mapsLink;

      alert("Location captured!");
    }, function() {
      alert("Location permission denied");
    });
  } else {
    alert("Geolocation not supported");
  }
}
</script>

</body>
</html>