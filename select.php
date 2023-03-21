<?php
    session_start();

    // display error message if sent back (error in query execution or inputs given)
    if(isset($_SESSION['status'])) {
        $message = $_SESSION['status'];
        echo "<script>alert('$message');</script>";

        // reset session variable
        unset($_SESSION['status']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- name of tab -->
        <title>Select</title>
        <!-- format different tags/aspects of the web page -->
        <style>
            form {
                width: 50%;
                margin: auto;
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
            }
            input[type=submit]:hover {
                background-color: #e9fce9;
            }
        </style>
    </head>

    <body>
        <h1>Select Information</h1>

        <!-- NOTE: add logout button & format -->
        <button onclick="location.href = 'home.html';">Go Back</button><br>
        <br>
        
        <!-- user enters student id, course id to view that student's information -->
        <form action="select_data.php" method="post">
            <label for="html">Student ID</label>
            <input type="text" id="student_id" name="student_id">
            <br>

            <label for="html">Course ID</label>
            <input type="text" id="course_id" name="course_id">
            <br>

            <input type="submit", value="Submit Request">
        </form>
    </body>
</html>