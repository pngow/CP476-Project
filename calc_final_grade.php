<?php
    session_start();

    // connect to database (include)
    include("conn_database.php");
?>

<!-- NOTE: this page is basically done except for formatting -->
<!DOCTYPE html>
<html>
    <head>
        <!-- name of tab -->
        <title>Final Grades</title>
        <!-- format different tags/aspects of the web page -->
        <style>
            h1 {
                text-align:center;
                margin-left: 15px;
            }

            div {
                width: 100%;
                text-align: center;
                display: inline-block;
            }

            button {
                margin-bottom: 25px;
                width: 20%;
                padding: 10px 24px;
                text-align: center;
                font-size:16px;
            }

            table {
                border: 1px solid black;
                border-collapse: collapse;
                width: 80%;
                cellpadding: "10";
                table-layout: fixed;
                margin-left: auto;
                margin-right: auto;
            }

            th {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
                font-size: 20px;
                padding: 10px;
                background-color: #e7e7e7;
            }

            td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
                font-size:18px;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <h1>Final Grades</h1>

        <div>
            <button onclick="location.href = 'home.html';">Go Back</button>
            <button onclick="location.href = 'logout.php';">Logout</button>
        </div>

        <!-- table to display results -->
        <table>
            <!-- header -->
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Course Code</th>
                <th>Final Grade</th> 
            </tr>

            <?php
                // uses PDO to connect to and interact with database
                try {
                    // create query
                    $query = "SELECT n.student_id, n.student_name, c.course_id, (c.test_1*0.2 + c.test_2*0.2 + c.test_3*0.2 + c.final_exam*0.4) as final_grade 
                        FROM name n, course c 
                        WHERE n.student_id = c.student_id";
                    $stmt = $conn->prepare($query);
                    // execute query in database
                    $stmt->execute();
                    // get results of query
                    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                    
                    // iterate through query results
                    foreach($result as $data) {
            ?>

            <!-- display each result in a new row in the table -->
            <tr>
                <td><?php echo $data['student_id']; ?> </td>
                <td><?php echo $data['student_name']; ?> </td>
                <td><?php echo $data['course_id']; ?> </td>
                <!-- number_format to only display one decimal -->
                <td><?php echo number_format($data['final_grade'],1); ?> </td>
            </tr>

            <?php
                }
            ?>
        </table>

        <?php
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </body>
</html>