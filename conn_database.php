<?php
    // use PDO to connect to database
    // file to be included in all other front end to get database info
    $host = "localhost";
    $database = "cp476";

    try {
        // open connection to database
        $conn = new PDO("mysql:host=$host;dbname=$database", $_SESSION['db_user'], $_SESSION['db_pass']);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>