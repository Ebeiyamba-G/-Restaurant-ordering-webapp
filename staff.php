<?php
session_start();
include 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username == "admin" && $password == "chop247") {  // you can hash passwords later
    $_SESSION['staff'] = $username;
} elseif (!isset($_SESSION['staff'])) {
    die("Access Denied. <a href='staff-login.html'>Login here</a>");
}

// Fetch all orders
$result = $conn->query("SELECT * FROM orders ORDER BY order_time DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Staff Dashboard</title>
</head>
<body>
  <h2>All Customer Orders</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Order Items</th>
      <th>Payment</th>
      <th>Total</th>
      <th>Time</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['customer_name'] ?></td>
        <td><?= $row['customer_phone'] ?></td>
        <td><?= $row['customer_address'] ?></td>
        <td><?= $row['order_items'] ?></td>
        <td><?= $row['payment_method'] ?></td>
        <td>₦<?= $row['total_price'] ?></td>
        <td><?= $row['order_time'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
