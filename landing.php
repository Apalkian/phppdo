<?php
require 'insert.php';
require 'update.php';
require 'delete.php';
require 'select.php';
?>

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

<div class="container py-5">

  <h2 class="text-center fw-bold mb-5">Simple PDO CRUD</h2>

  <div class="row g-4">

    <div class="col-lg-5 col-md-12">
      <div class="card">
        <div class="card-body p-4">

          <h4 class="mb-4 text-primary">
            <?= $editUser ? 'Update User' : 'Add New User' ?>
          </h4>

          <form method="POST">

            <?php if (!empty($editUser)): ?>
              <input type="hidden" name="users_id" value="<?= $editUser['users_id'] ?>">
            <?php endif; ?>

            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name"
                value="<?= $editUser['name'] ?? '' ?>"
                class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email"
                value="<?= $editUser['email'] ?? '' ?>"
                class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Product</label>
              <input type="text" name="product"
                value="<?= $editUser['product'] ?? '' ?>"
                class="form-control" required>
            </div>

            <div class="mb-4">
              <label class="form-label">Amount</label>
              <input type="number" step="0.01" name="amount"
                value="<?= $editUser['amount'] ?? '' ?>"
                class="form-control" required>
            </div>


  <!-- Submit buttons -->

  <?php if (!empty($editUser)): ?>
    
    <div class="d-grid gap-2"></div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="landing.php" class="btn btn-outline-secondary">Cancel</a>
    </div>
  <?php else: ?>
    <div class="d-grid gap-2"></div>
    <button type="submit" name="add" class="btn btn-success">Add</button>
    </div>

  <?php endif; ?>

</form>
        </div>
      </div>
    </div>

<!-- USER TABLE -->

  <div class="col-lg-7 col-md-12">
      <div class="card">
        <div class="card-body p-4">
           <h4 class="card-title mb-4 text-primary">User List</h4>
             <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
    <tr>
    <th>users_id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Product</th>
    <th>Amount</th>
    <th>Action</th>
  </tr>
  </thead>
  <?php foreach ($users as $user): ?>

  
    <td><?= $user['users_id'] ?></td>
    <td><?= $user['name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['product'] ?></td>
    <td><?= $user['amount'] ?></td>
  

    <td>
      <a href="?edit=<?= $user['users_id'] ?>" class="btn btn-success btn-sm">Edit</a> |
      <a href="?delete=<?= $user['users_id'] ?>" class="btn btn-danger btn-sm">Delete</a>

    </td>
  </tr>
  <?php endforeach; ?>
</table>
          </div>
        </div>
      </div>
    </div>

  </div>
 </body>
 </html>
