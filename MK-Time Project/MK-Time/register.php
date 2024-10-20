<?php
include "includes/head.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "connect_db.php";
    // Now we check if the data was submitted, isset() function will check if the data exists.
    if (!isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'])) {
        // Could not get the data that should have been sent.
        exit('Please complete the registration form!');
    }
    // Make sure the submitted registration values are not empty.
    if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        exit('Please complete the registration form');
    }
    // We need to check if the account with that username exists.
    if ($stmt = $link->prepare('SELECT user_id, pass FROM users WHERE email = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        // Store the result so we can check if the account exists in the database.
        if ($stmt->num_rows > 0) {
            // Username already exists
            $_SESSION['errorMessage'] = "username already exists";
            header("Location: createUser.php");
        } else {
            // Username doesn't exists, insert new account
            if ($stmt = $link->prepare('INSERT INTO users (first_name, last_name, email, pass) VALUES (?, ?, ?, ?)')) {
                // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('ssss', $_POST['first_name'], $_POST['last_name'], $_POST['email'], $pass);
                $stmt->execute();
                echo 'You have successfully registered! You can now login!';
                header('Location: login.php');
            } else {
                // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all three fields.
                echo 'Could not prepare statement!';
            }
        }
        $stmt->close();
    } else {
        // Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }
    $link->close();
} else {
    header("Location: index.php");
}
