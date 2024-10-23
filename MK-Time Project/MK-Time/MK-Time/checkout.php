<?php
include "includes/head.php";
include "includes/nav.php";

if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart']))) {
    require('connect_db.php');
    $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (" . $_SESSION['id'] . "," . $_GET['total'] . ", NOW() ) ";
    $r = mysqli_query($link, $q);
    $order_id = mysqli_insert_id($link);

    $q = "SELECT * FROM products WHERE item_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) {
        $q .= $id . ',';
    }
    $q = substr($q, 0, -1) . ') ORDER BY item_id ASC';
    $r = mysqli_query($link, $q);

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
  VALUES ( $order_id, 
         " . $row['item_id'] . ",
         " . $_SESSION['cart'][$row['item_id']]['quantity'] . ",
         " . $_SESSION['cart'][$row['item_id']]['price'] . ")";
        $result = mysqli_query($link, $query);
    }

    mysqli_close($link);

    echo '<div class="d-flex flex-column pt-4 justify-content-center align-items-center"><p>Your Order Number Is #' . $order_id . '</p> <p><a href="products.php">Return to home</a></p></div>';
    $_SESSION['cart'] = NULL;


} else {
    echo ' <div class="d-flex flex-column pt-4 justify-content-center align-items-center"><p>Your cart is empty.</p> <p><a href="products.php">Return to home</a></p></div> ';
}