<?php
    session_start();

    // connect to database (include)
    include("conn_database.php");

    // DATA VALIDATION - check inputs from form (size, data types etc... idk if i'm missing anything)
    if (empty($_POST['student_id'])) {
        // set session variable to be able to display error message on redirected page
        $_SESSION['status'] = "Student ID cannot be empty";
        // redirect page back to input form
        header('Location: select.php');
    } elseif (!(is_numeric($_POST['student_id']) && strlen(strval($_POST['student_id'])) == 9)) {
        // set session variable to be able to display error message on redirected page
        $_SESSION['status'] = "Student ID must be an integer with 9 characters";
        // redirect page back to input form
        header('Location: select.php');
    } elseif (empty($_POST['course_id'])) {
        // set session variable to be able to display error message on redirected page
        $_SESSION['status'] = "Course ID cannot be empty";
        // redirect page back to input form
        header('Location: select.php');
    } elseif (!(ctype_alpha(substr($_POST['course_id'], 0, 2)) && is_numeric(substr($_POST['course_id'], 2)))) {
        // set session variable to be able to display error message on redirected page
        $_SESSION['status'] = "Course ID must consist of two letters followed by three numbers";
        // redirect page back to input form
        header('Location: select.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- name of tab -->
        <title>Student Info</title>
        <!-- format different tags/aspects of the web page -->
        <style>
            button {
                margin-bottom: 25px;
                width: 20%;
                padding: 10px 24px;
                text-align: center;
                font-size:16px;
            }

            table {
                margin: auto;
                width: 50%;
                font-size:20px;
            }
        </style>
    </head>

    <body>
        <h1>Select Information</h1>
        
        <!-- NOTE: need to add logout button and format -->
        <div style="text-align: center">
            <button onclick="location.href = 'select.php';">Go Back</button>
            <button onclick="location.href = 'logout.php';">Logout</button>
        </div>
        <br><br>

        <?php
            // uses PDO to connect to and interact with database
            try {
                // prepare query
                $query = "SELECT n.student_id, n.student_name, c.course_id, c.test_1, c.test_2, c.test_3, c.final_exam
                    FROM name n 
                    INNER JOIN course c ON n.student_id = c.student_id
                    WHERE n.student_id = :student_id AND c.course_id = :course_id";
                $stmt = $conn->prepare($query);
                // bind values to the parameters in the SQL statement
                $stmt->bindValue(':student_id', $_POST['student_id'], PDO::PARAM_INT);
                $stmt->bindValue(':course_id', strtoupper($_POST['course_id']), PDO::PARAM_STR);
                //execute SQL
                $stmt->execute();
                // get results of query ... NOTE: assuming should only return one row
                //NOTE: Do we need to create solution for multiple values returned?
                // NOTE: checking if result returned nothing ... if so set to NULL
                $result = $stmt -> rowCount() == 0 ? NULL : $stmt -> fetchAll(PDO::FETCH_ASSOC);

        ?>

        <!-- display results from query ... if query returned nothing, will show N/As -->
        <table>
            <tr>
                <td><b>Student Name:</b></td>
                <td><?php echo is_null($result) ? "N/A" : $result[0]['student_name']; ?> </td>
            </tr>
            <tr>
                <td><b>Course ID:</b></td>
                <td><?php echo is_null($result) ? "N/A" : $result[0]['course_id']; ?> </td>
            </tr>
            <tr>
                <td><b>Test 1:</b></td>
                <td><?php echo is_null($result) ? "N/A" : $result[0]['test_1']; ?> </td>
            </tr>
            <tr>
                <td><b>Test 2:</b></td>
                <td><?php echo is_null($result) ? "N/A" : $result[0]['test_2']; ?> </td>
            </tr>
            <tr>
                <td><b>Test 3:</b></td>
                <td><?php echo is_null($result) ? "N/A" : $result[0]['test_3']; ?> </td>
            </tr>
            <tr>
                <td><b>Final Exam:</b></td>
                <td><?php echo is_null($result) ? "N/A" : $result[0]['final_exam']; ?> </td>
            </tr>
        </table>
            
        <?php
        //error handling
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </body>
</html>