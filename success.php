<?php
$msg = $_GET['msg'];
?>

<h2>Order Placed Successfully!</h2>

<a id="waLink">Send to WhatsApp</a>

<script>
let msg = `<?php echo $msg; ?>`;
let url = "https://wa.me/916369986828?text=" + msg;

document.getElementById("waLink").href = url;

// clear cart
localStorage.clear();
</script>