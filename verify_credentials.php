<?php
    session_start();

    // use PDO to connect to database
    // NOTE: should we also store thses in session variables?
    $host = "localhost";
    $database = "cp476";
    // get user inputted info
    $_SESSION['db_user'] = $_POST['db_user'];
    $_SESSION['db_pass'] = $_POST['db_pass'];

    try {
        // open connection to database
        $conn = new PDO("mysql:host=$host;dbname=$database", $_SESSION['db_user'], $_SESSION['db_pass']);
        echo "Connection successful.";
        
        // send to home page if connection was successful
        header('Location: home.html');

        // set up database
        include("populate_db.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();

        // send to login page if connection was unsuccessful (wrong login details)
        $_SESSION['status'] = $e->getMessage();
        header('Location: login.php');
    }
?>