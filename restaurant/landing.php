<?php
require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';

$editOrder = null;

if (isset($_GET['edit'])) {

  $order_id = $_GET['edit'];

  $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
  $stmt->execute([$order_id]);

  $editOrder = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Restaurant CRUD</title>
</head>

<body>

<div class="container py-5">

<h2 class="text-center fw-bold mb-5">Restaurant Order System</h2>

<div class="row g-4">

<!-- FORM -->

<div class="col-lg-5">

<div class="card">
<div class="card-body p-4">

<h4 class="mb-4 text-primary">
<?= $editOrder ? 'Update Order' : 'Add Order' ?>
</h4>

<form method="POST">

<?php if ($editOrder): ?>
<input type="hidden" name="order_id" value="<?= $editOrder['order_id'] ?>">
<?php endif; ?>

<div class="mb-3">
<label class="form-label">Customer ID</label>
<input type="number" name="customer_id"
value="<?= $editOrder['customer_id'] ?? '' ?>"
class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Item ID</label>
<input type="number" name="item_id"
value="<?= $editOrder['item_id'] ?? '' ?>"
class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Order Date</label>
<input type="date" name="order_date"
value="<?= $editOrder['order_date'] ?? '' ?>"
class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Quantity</label>
<input type="number" name="quantity"
value="<?= $editOrder['quantity'] ?? '' ?>"
class="form-control" required>
</div>

<?php if ($editOrder): ?>

<button type="submit" name="updateorders" class="btn btn-success">Update</button>
<a href="landing.php" class="btn btn-secondary">Cancel</a>

<?php else: ?>

<button type="submit" name="addorders" class="btn btn-success">Add</button>

<?php endif; ?>

</form>

</div>
</div>

</div>

<!-- TABLE -->

<div class="col-lg-7">

<div class="card">
<div class="card-body p-4">

<h4 class="card-title mb-4 text-primary">Order List</h4>

<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>
<th>Order ID</th>
<th>Customer</th>
<th>Dish</th>
<th>Price</th>
<th>Date</th>
<th>Quantity</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php foreach ($orders as $order): ?>

<tr>

<td><?= $order['order_id'] ?></td>
<td><?= $order['first_name'] ?> <?= $order['last_name'] ?></td>
<td><?= $order['dish_name'] ?></td>
<td><?= $order['price'] ?></td>
<td><?= $order['order_date'] ?></td>
<td><?= $order['quantity'] ?></td>

<td>

<a href="?edit=<?= $order['order_id'] ?>" class="btn btn-success btn-sm">Edit</a>

<a href="?delete=<?= $order['order_id'] ?>" class="btn btn-danger btn-sm">Delete</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>
</div>
</div>

</div>

</div>

</div>

</body>
</html>