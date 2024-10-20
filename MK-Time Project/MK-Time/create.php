<?php

include "includes/head.php";
include "includes/nav.php";
?>


<div class="container text-center"
    style=" margin-top:1rem;padding: 2rem; border-radius: 20px; background-color: #f1f2f4;">
    <h1>Add Item</h1>
    <form action="create.php" method="post">
        <!-- input box for item name  -->
        <label for="name">Item Name:</label>
        <input type="text" id="item_name" class="form-control" name="item_name" required value="">

        <!-- input box for item description -->
        <label for="description">Description:</label>
        <textarea id="item_desc" class="form-control" name="item_desc" required value="">
      </textarea>

        <!-- input box for image path -->
        <label for="image">Image:</label>
        <input type="text" id="item_img" class="form-control" name="item_img" required value="">

        <!-- input box for item price -->
        <label for="price">Price:</label>
        <input type="number" id="item_price" class="form-control" name="item_price" min="0" step="0.01" required
            value=""><br>
        <!-- submit button -->
        <input type="submit" class="btn btn-dark" value="Submit">
    </form>
</div>
</div>



<!-- PHP Logic when the submit button is pressed from within the form -->
<?php
include "includes/footer.php"
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for item name .
    if (empty($_POST['item_name'])) {
        $errors[] = 'Enter the item name.';
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
    }

    # Check for a item decription.
    if (empty($_POST['item_desc'])) {
        $errors[] = 'Enter the item decription.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
    }

    # Check for a item image.
    if (empty($_POST['item_img'])) {
        $errors[] = 'Enter the item image.';
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
    }

    # Check for a item price.
    if (empty($_POST['item_price'])) {
        $errors[] = 'Enter the item image.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }


    # On success data into my_table on database.
    if (empty($errors)) {
        $q = "INSERT INTO products (item_name, item_desc, item_img, item_price)
VALUES ('$n','$d', '$img', '$p' )";
        $r = @mysqli_query($link, $q);
        if ($r) {
            echo '<p class="text-center">New record created successfully</p>';
        }
        # Close database connection.
        mysqli_close($link);
        exit();
    } else {
        echo '<div class="text-center"><p>The following error(s) occurred:</p>';
        foreach ($errors as $msg) {
            echo "$msg<br>";
        }
        echo '<p>Please try again.</p></div>';
        # Close database connection.
        mysqli_close($link);
    }
}

?>