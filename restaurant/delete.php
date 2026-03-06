<?php
require 'config.php';

if (isset($_GET['deletecustomer'])) { 

    $customer_id = $_GET ['deletecustomer'];

    $stmt = $pdo->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->execute([$customer_id]);    
if (isset($_GET["deleteitem"])) {

    $item_id = $_GET["deleteitem"];

    $stmt2 = $pdo->prepare("DELETE FROM menuitems WHERE item_id = ?");
    $stmt2->execute([$item_id]);    
}
if (isset($_GET["deleteorder"])) {

    $order_id = $_GET["deleteorder"];

    $stmt3 = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt3->execute([$order_id]);    
} 
}
?>