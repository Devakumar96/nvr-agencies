<?php

include 'db.php';

/* GET FORM DATA */
$name = $_POST['name'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$cart = $_POST['cartData'];

/* CONVERT CART */
$data = json_decode($cart, true);

$total = 0;
$productText = "";

/* PRODUCT LOOP */
foreach($data as $item){

  $subtotal = $item['price'] * $item['qty'];

  $productText .=
    "🛒 " .
    $item['name'] .
    " x" .
    $item['qty'] .
    " = ₹" .
    $subtotal .
    "%0A";

  $total += $subtotal;

}

/* SAVE DATABASE */
$sql = "INSERT INTO orders
(name, phone, products, total)
VALUES
('$name','$phone','$productText','$total')";

$conn->query($sql);

/* WHATSAPP MESSAGE */
$message  = "🔥 *NEW ORDER RECEIVED* 🔥 %0A%0A";

$message .= "👤 *Customer:* $name %0A";

$message .= "📞 *Phone:* $phone %0A";

$message .= "📍 *Location:* $location %0A%0A";

$message .= "📦 *Order Items:* %0A";

$message .= $productText;

$message .= "%0A💰 *Total Amount:* ₹$total %0A";

$message .= "%0A🚚 Cash On Delivery";

/* WHATSAPP NUMBER */
$whatsapp =
"https://wa.me/918098274492?text=$message";

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">

  <meta name="viewport"
        content="width=device-width, initial-scale=1">

  <title>Order Placed - NVR Agencies</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>

    body{
      background:#f5f5f5;
    }

    .success-card{
      border:none;
      border-radius:20px;
      box-shadow:0 2px 15px rgba(0,0,0,0.1);
    }

    .footer{
      background:#212529;
      color:white;
      padding:20px;
      margin-top:50px;
      text-align:center;
    }

    .success-icon{
      font-size:80px;
      color:green;
    }

  </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

  <div class="container">

    <a class="navbar-brand fw-bold"
       href="index.php">

      NVR Agencies

    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse"
         id="navbarNav">

      <ul class="navbar-nav ms-auto">

        <li class="nav-item">

          <a class="nav-link"
             href="index.php">

            Home

          </a>

        </li>

        <li class="nav-item">

          <a class="nav-link"
             href="cart.php">

            Cart

          </a>

        </li>

      </ul>

    </div>

  </div>

</nav>

<!-- SUCCESS SECTION -->
<div class="container mt-5">

  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card success-card">

        <div class="card-body p-5 text-center">

          <!-- ICON -->
          <div class="success-icon mb-3">
            ✅
          </div>

          <!-- TITLE -->
          <h2 class="fw-bold text-success">

            Order Placed Successfully 🎉

          </h2>

          <p class="text-muted mt-3">

            Your order has been saved successfully.

          </p>

          <hr class="my-4">

          <!-- CUSTOMER DETAILS -->
          <div class="text-start">

            <h5 class="mb-3">
              👤 Customer Details
            </h5>

            <p>
              <strong>Name:</strong>
              <?php echo $name; ?>
            </p>

            <p>
              <strong>Phone:</strong>
              <?php echo $phone; ?>
            </p>

            <p>
              <strong>Total Amount:</strong>
              ₹<?php echo $total; ?>
            </p>

          </div>

          <hr class="my-4">

          <!-- WHATSAPP BUTTON -->
          <a href="<?php echo $whatsapp; ?>"
             target="_blank"
             class="btn btn-success btn-lg">

            <i class="bi bi-whatsapp"></i>

            Send Order To WhatsApp

          </a>

          <!-- BACK BUTTON -->
          <div class="mt-4">

            <a href="index.php"
               class="btn btn-primary">

              Continue Shopping

            </a>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- FOOTER -->
<footer class="footer">

  <div class="container">

    <h5>NVR Agencies</h5>

    <p>
      Water Supply & Delivery Service
    </p>

    <p class="mb-0">
      © <?php echo date("Y"); ?> NVR Agencies
    </p>

  </div>

</footer>

<script>

/* CLEAR CART */
localStorage.removeItem("cart");

</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>