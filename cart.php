<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cart - NVR Agencies</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- JS -->
  <script src="script.js" defer></script>

  <link rel="icon" type="image/png" href="logo.png">

  <style>

    body{
      background:#f5f5f5;
    }

    .cart-card{
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
          <a class="nav-link active" href="cart.php">
            <i class="bi bi-cart-fill"></i> Cart
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="admin.php">
            Admin
          </a>
        </li>

      </ul>

    </div>

  </div>

</nav>

<!-- CART SECTION -->
<div class="container mt-5">

  <div class="text-center mb-4">
    <h2 class="fw-bold">
      Your Shopping Cart
    </h2>
  </div>

  <div id="cartContainer" class="row g-4"></div>

  <!-- TOTAL -->
  <div class="card cart-card mt-4">

    <div class="card-body text-center">

      <h3 id="cartTotal">
        Total: ₹0
      </h3>

      <a href="checkout.php" class="btn btn-success btn-lg mt-3">
        <i class="bi bi-bag-check-fill"></i>
        Proceed To Checkout
      </a>

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

let cart = JSON.parse(localStorage.getItem("cart")) || [];

let container = document.getElementById("cartContainer");

let total = 0;

function saveCart(){
  localStorage.setItem("cart", JSON.stringify(cart));
}

function changeQty(index, change){

  cart[index].qty += change;

  if(cart[index].qty <= 0){
    cart.splice(index,1);
  }

  saveCart();

  location.reload();
}

function removeItem(index){

  cart.splice(index,1);

  saveCart();

  location.reload();
}

if(cart.length === 0){

  container.innerHTML = `
    <div class="col-12">
      <div class="alert alert-warning text-center">
        Your cart is empty
      </div>
    </div>
  `;

}else{

  cart.forEach((item,index)=>{

    total += item.price * item.qty;

    container.innerHTML += `

      <div class="col-md-4">

        <div class="card cart-card h-100">

          <div class="card-body text-center">

            <h4>${item.name}</h4>

            <h5 class="text-primary">
              ₹${item.price}
            </h5>

            <p>
              Quantity: <b>${item.qty}</b>
            </p>

            <div class="d-flex justify-content-center gap-2 mb-3">

              <button class="btn btn-success"
                onclick="changeQty(${index},1)">
                +
              </button>

              <button class="btn btn-warning"
                onclick="changeQty(${index},-1)">
                -
              </button>

            </div>

            <button class="btn btn-danger"
              onclick="removeItem(${index})">

              <i class="bi bi-trash-fill"></i>
              Remove

            </button>

          </div>

        </div>

      </div>

    `;
  });

}

document.getElementById("cartTotal").innerHTML =
  `Total: ₹${total}`;

</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>