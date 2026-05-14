<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>NVR Agencies</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- JS -->
  <script src="script.js" defer></script>

  <link rel="icon" type="image/png" href="logo.png">

  <style>

    body{
      background:#f5f5f5;
    }

    .hero{
      background: linear-gradient(135deg,#0d6efd,#0dcaf0);
      color:white;
      padding:80px 20px;
      text-align:center;
      border-radius:0 0 20px 20px;
    }

    .product-card{
      border:none;
      border-radius:15px;
      transition:0.3s;
      box-shadow:0 2px 10px rgba(0,0,0,0.08);
    }

    .product-card:hover{
      transform:translateY(-5px);
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

    <a class="navbar-brand fw-bold d-flex align-items-center" href="#">

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
          <a class="nav-link active" href="index.php">
            Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php">
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

<!-- HERO SECTION -->
<section class="hero-section">

  <div class="hero-overlay">

    <div class="hero-content">

      <h1>
        Pure Water Supply For Every Need 💧
      </h1>

      <p>
        Marriage Functions, Party Halls,
        Homes, Shops & Stores Available
        With All Size Water Cans.
      </p>

      <a href="#products" class="hero-btn">
        View Products
      </a>

    </div>

  </div>

</section>
<!-- PRODUCTS -->
<section class="container mt-5" id="products">

  <div class="text-center mb-5">
    <h2 class="fw-bold">
      Our Products
    </h2>
  </div>

  <div class="row">

    <!-- PRODUCT 1 -->
    <div class="col-md-4 mb-4">

      <div class="card product-card h-100">

        <div class="card-body text-center">

          <img src="https://cdn-icons-png.flaticon.com/512/3105/3105807.png"
               width="120"
               class="mb-3">

          <h4>Water Can</h4>

          <p class="text-muted">
            Fresh drinking water can delivery
          </p>

          <h5 class="text-primary mb-3">
            ₹30
          </h5>

          <button class="btn btn-primary"
            onclick="addToCart('Water Can',30)">
            <i class="bi bi-cart-plus"></i>
            Add to Cart
          </button>

        </div>

      </div>

    </div>

    <!-- PRODUCT 2 -->
    <div class="col-md-4 mb-4">

      <div class="card product-card h-100">

        <div class="card-body text-center">

          <img src="https://cdn-icons-png.flaticon.com/512/2972/2972185.png"
               width="120"
               class="mb-3">

          <h4>20L Bottle</h4>

          <p class="text-muted">
            Mineral water bottle supply
          </p>

          <h5 class="text-primary mb-3">
            ₹50
          </h5>

          <button class="btn btn-primary"
            onclick="addToCart('20L Bottle',50)">
            <i class="bi bi-cart-plus"></i>
            Add to Cart
          </button>

        </div>

      </div>

    </div>

    <!-- PRODUCT 3 -->
    <div class="col-md-4 mb-4">

      <div class="card product-card h-100">

        <div class="card-body text-center">

          <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png"
               width="120"
               class="mb-3">

          <h4>Cool Water Pack</h4>

          <p class="text-muted">
            Chilled water delivery service
          </p>

          <h5 class="text-primary mb-3">
            ₹80
          </h5>

          <button class="btn btn-primary"
            onclick="addToCart('Cool Water Pack',80)">
            <i class="bi bi-cart-plus"></i>
            Add to Cart
          </button>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- CART BUTTON -->
<div class="text-center mt-4">

  <a href="cart.php" class="btn btn-success btn-lg">
    <i class="bi bi-cart-check-fill"></i>
    Go To Cart
  </a>

</div>

<!-- FOOTER -->
<footer class="footer">

  <div class="container">

    <h5>NVR Agencies</h5>

    <p>
      Water Supply & Delivery Service
    </p>

    <p class="mb-0">
      © <?php echo date("Y"); ?> NVR Agencies. All Rights Reserved.
    </p>

  </div>

</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
