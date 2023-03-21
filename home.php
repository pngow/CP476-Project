<?php
    session_start();

    echo $_SESSION['db_conn'];
    echo $_SESSION['db_user'];
    echo $_SESSION['db_pass'];

?>

<html>
    <head>
        <!-- name of tab -->
        <title>Navigation</title>
        <!-- format different tags/aspects of the web page -->
        <style>
            form {
                text-align:center;
            }

            input[type=button] {
                width: 50%;
                margin: 15px;
                padding: 10px 24px;
                text-align: center;
                font-size:14px;
            }
        </style>
    </head>

    <!-- create initial page asking whether user wants to view student information, update student information, calculate total grade -->
    <h1>What would you like to do?</h1>

    <form>
        <input type="button" onclick="location.href = 'select.php';" value="View Student Information"><br>
        <br>
        <input type="button" onclick="location.href = 'update.html';" value="Update Student Information"><br>
        <br>
        <input type="button" onclick="location.href = 'calc_final_grade.php';" value="Get Total Grades"><br>
    </form>
</html>