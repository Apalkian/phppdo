<?php
require 'config.php';

if (isset($_POST['updatecustomer'])) {

    $customer_id = $_POST['customer_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];

    $stmt = $pdo->prepare("UPDATE customers SET first_name=?, last_name=?, phone_number=? WHERE customer_id=?");
    $stmt->execute([$first_name, $last_name, $phone_number, $customer_id]);

    echo "Customer updated successfully";
}

if (isset($_POST['updatemenu'])) {

    $item_id = $_POST['item_id'];
    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $stmt2 = $pdo->prepare("UPDATE menuitems SET dish_name=?, price=?, category=? WHERE item_id=?");
    $stmt2->execute([$dish_name, $price, $category, $item_id]);

    echo "Menu updated successfully";
}

if (isset($_POST['updateorders'])) {

    $order_id = $_POST['order_id'];
    $order_date = $_POST['order_date'];
    $quantity = $_POST['quantity'];

    $stmt3 = $pdo->prepare("UPDATE orders SET order_date=?, quantity=? WHERE order_id=?");
    $stmt3->execute([$order_date, $quantity, $order_id]);

    echo "Order updated successfully";
}
?>