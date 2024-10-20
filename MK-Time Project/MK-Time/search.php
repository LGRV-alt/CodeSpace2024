<?php
// inports the head and nav file
include "includes/head.php";
include "includes/nav.php";

// attaches value from the url
$search = $_GET['search'];

// Connect to the database
require "connect_db.php";
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

// SQL Query to filter for the word passed to the page
$sql = "select * from products where item_desc like '%$search%' OR item_name like '%$search%'";

// if the word is found to be in either the item description or name
$result = $link->query($sql);
echo "<div style='display: flex; justify-content: space-evenly; flex-wrap: wrap;'>";
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) { ?>

    <div class="col-md-3 d-flex justify-content-center text-center pt-3">
      <div class="card" style="width: 18rem;">
        <img src="img/<?= $row['item_img'] ?>" class="card-img-top" alt="T-Shirt">
        <div class="card-body">
          <h5 class="card-title text-center"><?= $row['item_name'] ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <p class="text-center">£ <?= $row['item_price'] ?></p>
          </li>
          <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block"
              href="product.php?id=<?= $row['item_id'] ?>">
              View</a></li>
        </ul>
      </div>
    </div>
  <?php }
} else {
  // if nothing is found in the database with the same value as the search word
  echo "0 records";
}

$link->close();

?>