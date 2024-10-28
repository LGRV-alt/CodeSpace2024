<?php
include "includes/head.php";
include "includes/nav.php";
include "connect_db.php";

$q = "SELECT * FROM products WHERE item_id = $_GET[id] ";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    $product = mysqli_fetch_array($r, MYSQLI_ASSOC);
} else {
    exit('Product does not exist!');
}


if (isset($_SESSION['first_name']) && $_SESSION['first_name'] === "Admin"): ?>
    <div class="container-fluid">
        <div class="card mb-3 mt-3" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="img/<?= $product['item_img'] ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?= $product['item_name'] ?></h1>
                        <p class="card-text">
                            <?= $product['item_desc'] ?>
                        </p>
                        <p>£<?= $product['item_price'] ?></p>
                        <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block"
                                href="update.php?id=<?= $_GET['id'] ?>">Update</a>
                        <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block"
                                href="delete.php?item_id=<?= $_GET['id'] ?>">Delete</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="container-fluid">
        <div class="card mb-3 mt-3" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="img/<?= $product['item_img'] ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?= $product['item_name'] ?></h1>
                        <p class="card-text">
                            <?= $product['item_desc'] ?>
                        </p>

                        <p>£<?= $product['item_price'] ?></p>
                        <form action="cart.php" method="POST">
                            <input type="number" name="quantity" value="1" min="1" max="20" placeholder="Quantity" required>
                            <input type="hidden" name="item_id" value="<?= $product['item_id'] ?>">
                            <input type="submit" name="add_to_cart" value="Add To Cart">
                        </form>
                        <!-- <p class="card-text"><small class="text-muted">INSERT - Quantity?</small></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<?= include "includes/footer.php"; ?>