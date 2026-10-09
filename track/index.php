<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Track Package</title>
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card p-4 shadow">
    <h3 class="text-center">Track Your Shipment</h3>
    <form action="result.php" method="get">
      <div class="mb-3">
        <label for="tracking_number" class="form-label">Enter Tracking Number</label>
        <input type="text" class="form-control" id="tracking_number" name="tracking_number" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Track</button>
    </form>
  </div>
</div>
</body>
</html>