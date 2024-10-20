<?php
require "connect_db.php";
session_start();
$errors = array();
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    $_SESSION['errors'] = 'Both fields need to be filled out';
}


if ($stmt = $link->prepare('SELECT user_id, pass, first_name FROM users WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $pass, $first_name);
        $stmt->fetch();
        echo $pass;
        echo $_POST['password'];
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $pass)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $user_id;
            $_SESSION['first_name'] = $first_name;
            header('Location: products.php');
        } else {
            // Incorrect password ---- Maybe add a modal screen to alert?
            $_SESSION['errors'] = "Incorrect Password/Username";
            header("Location:index.php");
            // echo 'Incorrect username and/or password!';

        }
    } else {
        echo
            "<script>
        alert('Incorrect Password/Username');
        </script>
        ";

    }
    $stmt->close();
}
