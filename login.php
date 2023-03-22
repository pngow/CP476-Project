<?php
    session_start();

    // display error message if sent back from another page
    if(isset($_SESSION['status'])) {
        echo "<script>alert('Connection failed. Try again.');</script>";

        // reset database username/password storage ... incorrect user info
        unset($_SESSION['db_user']);
        unset($_SESSION['db_pass']);
        // reset session variable
        unset($_SESSION['status']);
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- name of tab -->
        <title>Database Login</title>
        <!-- format different tags/aspects of the web page -->
        <!-- temporary formatting, will make it look nicer -->
        <style>
            form {
                width: 50%;
                margin: auto;
                margin-top:50px;
                background-color: #e7e7e7;
                padding: 15px;
            }

            input[type=text] {
                font-size: 16px;
                width: 90%;
                padding: 8px 8px;
                margin: 15px;
                box-sizing: border-box;
            }

            input[type=password] {
                font-size: 16px;
                width: 90%;
                padding: 8px 8px;
                margin: 15px;
                box-sizing: border-box;
            }

            label {
                font-size:20px;
                margin: 15px;
                text-align:left;
            }

            button {
                margin: 15px;
                padding: 10px 24px;
                text-align: center;
                font-size:16px;
            }

            input[type=submit] {
                margin: 15px;
                padding: 10px 24px;
                text-align: center;
                font-size:16px;
                background-color: white;
                border-width: 1px;
                border-color: grey;
            }
            input[type=submit]:hover {
                color: white;
                background-color: black;
            }
        </style>
    </head>

    <body>
        <!-- NOTE: do we need to ask for host & database too? -->
        <form action="verify_credentials.php" method="post">
            <label for="html">Username</label>
            <input type="text" id="db_user" name="db_user">
            <br>

            <label for="html">Password</label>
            <input type="password" id="db_pass" name="db_pass">
            <br>
            
            <input type="submit", value="Login">
        </form>
    </body>
</html>
