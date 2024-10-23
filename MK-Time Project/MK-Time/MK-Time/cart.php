<?php
include "includes/head.php";
include "includes/nav.php";
$mysqli = new mysqli('localhost:3307', 'root', 'Password1', 'mktime'); // Update with your DB credentials

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fetch products from the database
// $query = "SELECT * FROM products";
// $result = $mysqli->query($query);

// Add product to cart when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details
    $product_query = $mysqli->query("SELECT * FROM products WHERE item_id = $item_id");
    $product = $product_query->fetch_assoc();


    // Check if product is already in the cart
    if (isset($_SESSION['cart'][$item_id])) {

        // Update the quantity
        $_SESSION['cart'][$item_id]['quantity'] += $quantity;
    } else {
        // Add new product to the cart
        $_SESSION['cart'][$item_id] = [
            'id' => $product['item_id'],
            'name' => $product['item_name'],
            'desc' => $product['item_desc'],
            'price' => $product['item_price'],
            'image' => $product['item_img'],
            'quantity' => $quantity
        ];
    }

    $grand_total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $grand_total += $item['price'] * $item['quantity'];
    }
    $_SESSION['total'] = $grand_total;

    // Redirect back to cart page
    header('Location: cart.php');
    exit();
}


// When delete button is pressed it will send the items ID to the url with a get method 
// This is then grabbed and if it matched an item in the cart array it is removed
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SESSION['cart'][$id]['id'] == $id) {
        unset($_SESSION['cart'][$id]);
        header("location: cart.php");
    }
}

if (isset($_GET['clear'])) {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
        header("location: cart.php");
    }
}

?>




<!-- Cart Section -->
<div class="container-fluid mt-5 p-3 rounded cart">
    <h2 style="text-align: center;">Your Cart</h2>
    <div class="d-flex flex-column no-gutters justify-content-between ">
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item_id => $item): ?>
                <div class="col-md-10">
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                        <div class="d-flex flex-row"><img class="rounded" src="img/<?= $item['image'] ?>" width="90">
                            <div class="ml-2 w-75"><span
                                    class="font-weight-bold d-block"><?php echo $item['name']; ?></span><span
                                    class="spec"><?php echo $item['desc']; ?></span></div>
                        </div>
                        <div class="d-flex flex-row align-items-center"><span class="d-block"><?php
                        echo $item['quantity']; ?></span><span
                                class="d-block ml-5 font-weight-bold">£<?php echo $item['price']; ?></span><i
                                class="fa fa-trash-o ml-3 text-black-50"></i>
                            <a class="cart-delete-button" href="cart.php?id=<?= $item['id'] ?>">
                                Delete</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>



            <p class="text-center"><strong>Grand Total: £<?php
            echo $_SESSION['total'];
            ?></strong></p>
            <a class="cart-delete-button text-center" href="checkout.php?total=<?= $_SESSION['total'] ?>">
                Check out</a>
            <a class="cart-delete-button text-center" href="cart.php?clear">
                Clear Cart</a>
        <?php else: ?>
            <p class="text-center">Your cart is empty.</p>
        <?php endif; ?>

    </div>
    </body>

    </html>