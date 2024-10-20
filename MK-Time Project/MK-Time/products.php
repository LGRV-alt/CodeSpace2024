<!-- Brings the navbar into the page -->

<?php
include "includes/head.php";
include "includes/nav.php";
// Open the connection to the database
require "connect_db.php";
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>
<div class='page-banner'>
  <div class="header">
    <div class="header-img">
      <img src="img/header-watch.jpg" alt="">
    </div>
    <div class="header-info">
      <h2>Welcome to MK Time</h2>
      <p>We believe every second counts, and every watch tells a story.
        Discover your perfect timepiece and elevate your look today.</p>
    </div>
  </div>

</div>
<div style='display: flex; justify-content: space-evenly; flex-wrap: wrap;'>
  <?php
  // Grab the items from the "product" database table
  $q = "SELECT * FROM products";
  $r = mysqli_query($link, $q);
  if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { ?>

      <div class="col-md-3 d-flex justify-content-center text-center pt-3">
        <div class="card" style="width: 18rem;">
          <img src="img/<?= $row['item_img'] ?>" class="card-img-top" alt="T-Shirt">
          <!-- <img src="img/stan.jpg" class="card-img-top" alt="T-Shirt"> -->
          <div class="card-body">
            <h5 class="card-title text-center"> <?= $row['item_name'] ?> </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <p class="text-center"> £<?= $row['item_price'] ?> </p>
            </li>
            <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block"
                href="product.php?id=<?= $row['item_id'] ?>">
                View</a></li>
          </ul>
        </div>
      </div>
    <?php }

    // Close the Connection: After you're done fetching data, it's good practice to close the database connection to free up resources.
  


    # Close database connection.
    mysqli_close($link);
  } else {
    echo '<p> There are currently no items in the table to display.</p>';
  }
  include "includes/footer.php"

    ?>
</div>