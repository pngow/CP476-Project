<!-- NOTE: this one is not close to done lool -->
<!-- NOTE: What is left? -->
<!DOCTYPE html>
<html>
    <head>
        <!-- name of tab -->
        <title>Update Grade</title>
        <!-- format different tags/aspects of the web page -->
        <style>
            h1 {
                text-align: center;
            }

            .navi_buttons {
                width: 100%;
                text-align: center;
                display: inline-block;
            }

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
                margin-bottom: 25px;
                width: 20%;
                padding: 10px 24px;
                text-align: center;
                font-size:16px;
            }

            .radio_buttons {
                margin: 15px;
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
        <h1>Update Information</h1>

        <div class="navi_buttons">
            <button onclick="location.href = 'home.html';">Go Back</button>
            <button onclick="location.href = 'logout.php';">Logout</button>
        </div>
        <br>
        <br>

        <form action="update_data.php" method="post">
            <!-- need to verify format (9 numeric character id) -->
            <label for="html">Student ID</label><br>
            <input type="text" id="student_id" name="student_id">
            <br>
            
            <!-- need to verify format: 2 uppercase letters, 3 numbers -->
            <label for="html">Course ID</label><br>
            <input type="text" id="course_id" name="course_id">
            <br>
            
            <!-- can only select one ... accessible by the name test_type -->
            <label>Select Test To Update</label><br>
            <div class="radio_buttons">
                <input type="radio" id="test1" name="test_type" value="Test 1">
                <label for="test1">Test 1</label>
                <input type="radio" id="test2" name="test_type" value="Test 2">
                <label for="test2">Test 2</label>
                <input type="radio" id="test3" name="test_type" value="Test 3">
                <label for="test3">Test 3</label>
                <input type="radio" id="final_exam" name="test_type" value="Final Exam">
                <label for="final_exam">Final Exam</label>
            </div>

            <!-- verify valid grade number format -->
            <label for="html">Updated Grade</label><br>
            <input type="text" id="updated_grade" name="updated_grade"><br>

            <input type="submit", value="Submit Request">
        </form>
    </body>
</html>