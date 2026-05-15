<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Checkout - NVR Agencies</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="icon" type="image/png" href="logo.png">
  <style>

    body{
      background:#f5f5f5;
    }

    .checkout-card{
      border:none;
      border-radius:15px;
      box-shadow:0 2px 10px rgba(0,0,0,0.08);
    }

    .footer{
      background:#212529;
      color:white;
      padding:20px;
      margin-top:50px;
      text-align:center;
    }

  </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

  <div class="container">

    <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php">
     <img src="logo.png"
       width="45"
       height="45"
       class="me-2 rounded-circle">

  NVR Agencies

</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link" href="index.php">
            Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php">
            Cart
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="checkout.php">
            Checkout
          </a>
        </li>

      </ul>

    </div>

  </div>

</nav>

<!-- CHECKOUT -->
<div class="container mt-5">

  <div class="row justify-content-center">

    <div class="col-lg-6">

      <div class="card checkout-card">

        <div class="card-body p-4">

          <div class="text-center mb-4">

            <h2 class="fw-bold">
              Checkout
            </h2>

            <p class="text-muted">
              Complete your order details
            </p>

          </div>

          <form action="place_order.php" method="POST">

            <!-- NAME -->
            <div class="mb-3">

              <label class="form-label">
                Full Name
              </label>

              <input type="text"
                     name="name"
                     class="form-control"
                     placeholder="Enter your name"
                     required>

            </div>

            <!-- PHONE -->
            <div class="mb-3">

              <label class="form-label">
                Phone Number
              </label>

              <input type="text"
                     name="phone"
                     class="form-control"
                     placeholder="Enter phone number"
                     required>

            </div>

            <!-- LOCATION -->
            <!-- <div class="mb-3">

              <label class="form-label">
                Delivery Location
              </label>

              <div class="d-grid">

                <button type="button"
                        class="btn btn-outline-primary"
                        onclick="getLocation()">

                  <i class="bi bi-geo-alt-fill"></i>
                  Get My Location

                </button>

              </div>

            </div> -->

            <!--LOCATION STATUS -->
            <!-- <div class="alert alert-info" id="locationStatus">

              Location not captured

            </div> -->

            <!-- HIDDEN INPUT -->
            <input type="hidden"
                   name="location"
                   id="location">

            <!-- CART DATA -->
            <input type="hidden"
                   name="cartData"
                   id="cartData">

            <!-- PAYMENT -->
            <div class="card bg-light border-0 mb-4">

              <div class="card-body">

                <h5>
                  Payment Method
                </h5>

                <p class="mb-0 text-success fw-bold">
                  Cash On Delivery
                </p>

              </div>

            </div>

            <!-- ORDER SUMMARY -->
            <div class="card border-0 bg-light mb-4">

              <div class="card-body">

                <h5 class="mb-3">
                  Order Summary
                </h5>

                <div id="orderSummary"></div>

                <hr>

                <h4 id="totalAmount">
                  Total: ₹0
                </h4>

              </div>

            </div>

            <!-- SUBMIT -->
            <div class="d-grid">

              <button type="submit"
                      class="btn btn-success btn-lg">

                <i class="bi bi-bag-check-fill"></i>
                Place Order

              </button>

            </div>

          </form>

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

/* CART DATA */
let cart = JSON.parse(localStorage.getItem("cart")) || [];

document.getElementById("cartData").value =
  JSON.stringify(cart);

let total = 0;

cart.forEach(item=>{

  total += item.price * item.qty;

  document.getElementById("orderSummary").innerHTML += `
    <div class="d-flex justify-content-between mb-2">

      <span>
        ${item.name} x ${item.qty}
      </span>

      <span>
        ₹${item.price * item.qty}
      </span>

    </div>
  `;

});

document.getElementById("totalAmount").innerHTML =
  `Total: ₹${total}`;

/* LOCATION */
// function getLocation(){

//   if(navigator.geolocation){

//     navigator.geolocation.getCurrentPosition(

//       function(position){

//         let lat = position.coords.latitude;
//         let lng = position.coords.longitude;

//         let mapsLink =
//           `https://www.google.com/maps?q=${lat},${lng}`;

//         document.getElementById("location").value =
//           mapsLink;

//         document.getElementById("locationStatus")
//           .innerHTML =
//           "✅ Location captured successfully";

//         document.getElementById("locationStatus")
//           .classList.remove("alert-info");

//         document.getElementById("locationStatus")
//           .classList.add("alert-success");

//       },

//       function(){

//         document.getElementById("locationStatus")
//           .innerHTML =
//           "❌ Location permission denied";

//         document.getElementById("locationStatus")
//           .classList.remove("alert-info");

//         document.getElementById("locationStatus")
//           .classList.add("alert-danger");

//       }

//     );

//   }else{

//     alert("Geolocation not supported");

//   }

// }

</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>