<?php
require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';
?>

<h2>Simple PDO CRUD</h2>

<?php

// CHECK IF EDIT MODE

$editUser = null;

if (isset($_GET['edit'])) {

  $users_id = $_GET['edit'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE users_id = ?");

  $stmt->execute([$users_id]);

  $editUser = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>

<!-- ADD / UPDATE FORM -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>PHP FORM</title>
 </head>
 <body>

<h3 ><?= $editUser ? 'Update User' : 'Add User' ?></h3>

<form method="POST">
  <?php if (!empty($editUser)): ?>

    <input type="hidden" name="users_id" value="<?= $editUser['users_id'] ?>">
  <?php endif; ?>
  <div class="input group mb-3"></div>
      <label>Name:</label>
        <span class="input-group-text" name="name"></span>
          <input type="text" name="name" value="<?= !empty($editUser) ? $editUser['name'] : '' ?>" required><br>
      </div>
    <div class="input group mb-3">
        <label type="text" class="form-control" placeholder="Email">Email:</label>
          <input type="email" name="email" value="<?= !empty($editUser) ? $editUser['email'] : '' ?>" required><br>
    </div>
    <div class="input-group">
  <span class="input-group-text"><strong>Product</strong></span>
  <input type="text" name="product" placeholder="Product" required><br>
  </div>
  <div class="input-group mb-3">
  <span class="input-group-text">$</span>
  <input type="text" aria-label="Dollar amount" step="0.01" name="amount" placeholder="Amount" required><br>
  </div>

  <!-- Submit buttons -->

  <?php if (!empty($editUser)): ?>

    <button type="submit" name="update">Update</button>
    <a href="landing.php">Cancel</a>

  <?php else: ?>

    <button type="submit" name="add">Add</button>

  <?php endif; ?>

</form>
<hr>
<!-- USER TABLE -->
<h3 >User & Order List</h3>
<table class="table">
  <thead class="thead-dark">
    <tr>
     <th scope="col">users_id</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Product</th>
    <th scope="col">Amount</th>
    <th scope="col">Action</th>
    </tr>
  </thead>
  <?php foreach ($users as $user): ?>

  <tr>
    <td><?= $user['users_id'] ?></td>
    <td><?= $user['name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['product'] ?></td>
    <td><?= $user['amount'] ?></td>
  

    <td>

      <a href="?edit=<?= $user['users_id'] ?>">Edit</a> |
      <a href="?delete=<?= $user['users_id'] ?>">Delete</a>

    </td>
  </tr>
  <?php endforeach; ?>
</table>
  
 </body>
 </html>
