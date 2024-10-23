<?php
include "includes/head.php";
include "includes/nav.php";
include "connect_db.php";
$q = "SELECT * FROM products WHERE item_id = $_GET[id] ";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');
    // Get the data for the product from the database - if no input it given pass the values from the database
    $q = "SELECT * FROM products WHERE item_id = $_GET[id] ";
    $r = mysqli_query($link, $q);
    if (mysqli_num_rows($r) > 0) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    }
    # Initialize an error array.
    $errors = array();

    # Check for a item ID.
    if (empty($_POST['item_id'])) {
        $errors[] = 'Update item ID.';
    } else {
        $id = mysqli_real_escape_string($link, trim($_POST['item_id']));
    }

    # Check for a item name.
    if (empty($_POST['item_name'])) {
        $n = $row['item_name'];
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
    }

    # Check for a item description.
    if (empty($_POST['item_desc'])) {

        $d = $row['item_desc'];
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
    }

    # Check for a item price.
    if (empty($_POST['item_img'])) {
        $img = $row['item_img'];
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
    }

    # Check for a item price.
    if (empty($_POST['item_price'])) {
        $p = $row['item_price'];
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }
    if (empty($errors)) {
        $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
        $r = @mysqli_query($link, $q);
        if ($r) {
            header("Location: index.php");
        } else {
            echo "Error updating record: " . $link->error;
        }
        # Close database connection.
        mysqli_close($link);
    } else {
        echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>';
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        echo '<p>or please try again.</p></div>';

    }
}
?>



<div class="container text-center"
    style=" margin-top:1rem;padding: 2rem; border-radius: 20px; background-color: #f1f2f4;">
    <h2>Update the product </h2>
    <form style="width:100%;" action=" update.php?id=<?php echo $_GET['id'] ?>" method="post"
        class="form-group d-flex justify-content-center align-items-center flex-column">
        <label for="itemId" hidden> Item ID
            <input type="text" name="item_id" class="form-control" id="itemId" hidden value="<?php echo $_GET['id'] ?>">
        </label>
        <label for="itemName"> Item Name
            <input placeholder="<?= $row['item_name'] ?>" type="text" name="item_name" class="form-control"
                id="itemName" value="<?php if (isset($_POST['item_name']))
                    echo $_POST['item_name']; ?>">
        </label>
        <label for="itemDescription"> Item Description
            <textarea style="height:15rem; width:25rem;" placeholder="<?= $row['item_desc'] ?>" type="text"
                name="item_desc" class="form-control" id="itemDescription" value="<?php if (isset($_POST['item_desc']))
                    echo $_POST['item_desc']; ?>"></textarea>
        </label>
        <label for="itemImg"> Item Image
            <input type="text" name="item_img" placeholder="<?= $row['item_img'] ?>" class="form-control" id="itemImg"
                value="<?php if (isset($_POST['item_img']))
                    echo $_POST['item_img']; ?>">
        </label>
        <label for="itemPrice"> Item Price
            <input type="text" name="item_price" placeholder="<?= $row['item_price'] ?>" class="form-control"
                id="itemPrice" value="<?php if (isset($_POST['item_price']))
                    echo $_POST['item_price']; ?>">
        </label>
        <input type="submit" class="btn btn-dark" value="Update">
</div>