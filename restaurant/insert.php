<?php
require 'config.php';
if (isset($_POST['addcustomer'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];

    $stmt = $pdo->prepare("INSERT INTO customers ( first_name, last_name, phone_number) VALUES (?, ?, ?)");
    $stmt->execute([$first_name, $last_name, $phone_number]);
    echo"DATA inserted successfully";

if(isset($_POST['addmenu'])) {
    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $stmt2 = $pdo->prepare("INSERT INTO menuitems (dish_name, price, category) VALUES (?, ?, ?)");
    $stmt2->execute([$dish_name, $price, $category]);
    echo "DATA inserted successfully";

if(isset($_POST['addoders'])) {

    $order_date = $_POST['order_date'];
    $quantity = $_POST['quantity'];

    $stmt3 = $pdo->prepare("INSERT INTO orders (order_date, quantity) VALUES (?, ?)");
    $stmt3->execute([$order_date, $quantity]);

    echo "DATA inserted successfully";
}
}
}
?>