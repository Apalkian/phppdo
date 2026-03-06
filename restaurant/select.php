<?php
require 'config.php';


$stmt = $pdo->query("SELECT o.order_id, c.first_name, c.last_name, m.dish_name, o.quantity, o.order_date
FROM Orders o JOIN Customers c ON o.customer_id = c.customer_id JOIN MenuItems m ON o.item_id = m.item_id");
$customers = $stmt->setFetchMode(PDO::FETCH_ASSOC);
