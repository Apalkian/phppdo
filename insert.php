<?php
require 'config.php';
 if (isset($_POST['add']))  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $product = $_POST['product'];
    $amount = $_POST['amount'];

    //insert into user 
    $stmt = $pdo->prepare("INSERT INTO users(name,email)VALUES (?,?)");
    $stmt->execute([$name,$email]);

    //GET THE LAST INSERTED USER_ID
    $users_id = $pdo->lastInsertId();

    //insert into pders using that user_id
    $stmt2 = $pdo->prepare("INSERT INTO orders(user_id, product, amount) VALUES (?,?,?)");
    $stmt2->execute([$users_id, $product, $amount]);

    echo"user and order added successfully";
 }
 ?>