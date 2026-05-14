<?php
include 'db.php';

$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");

$totalOrders = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Panel - NVR Agencies</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    body {
      background: #f5f5f5;
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .card-box {
      border-radius: 12px;
      padding: 20px;
      background: white;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .table-container {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .badge-status {
      font-size: 14px;
      padding: 8px 12px;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">

    <a class="navbar-brand fw-bold" href="#">
      NVR Agencies Admin
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link active" href="admin.php">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="bi bi-globe"></i> Website
          </a>
        </li>

      </ul>

    </div>
  </div>
</nav>

<div class="container mt-4">

  <!-- TOP CARDS -->
  <div class="row mb-4">

    <div class="col-md-4 mb-3">
      <div class="card-box">

        <h5>Total Orders</h5>

        <h2 class="text-primary">
          <?php echo $totalOrders; ?>
        </h2>

      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card-box">

        <h5>Payment Mode</h5>

        <h4 class="text-success">
          Cash on Delivery
        </h4>

      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card-box">

        <h5>Status</h5>

        <span class="badge bg-success badge-status">
          Website Running
        </span>

      </div>
    </div>

  </div>

  <!-- ORDERS TABLE -->
  <div class="table-container">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Customer Orders</h4>
    </div>

    <div class="table-responsive">

      <table class="table table-bordered table-hover align-middle">

        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Products</th>
            <th>Total</th>
            <th>Date</th>
          </tr>
        </thead>

        <tbody>

        <?php while($row = $result->fetch_assoc()) { ?>

          <tr>

            <td>
              #<?php echo $row['id']; ?>
            </td>

            <td>
              <?php echo $row['name']; ?>
            </td>

            <td>
              <?php echo $row['phone']; ?>
            </td>

            <td style="white-space: pre-line;">
              <?php echo urldecode($row['products']); ?>
            </td>

            <td>
              ₹<?php echo $row['total']; ?>
            </td>

            <td>
              <?php echo $row['created_at']; ?>
            </td>

          </tr>

        <?php } ?>

        </tbody>

      </table>

    </div>

  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>