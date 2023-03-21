<!-- NOTE: this one is not close to done lool -->
<!DOCTYPE html>
<html>
    <head>
        <!-- name of tab -->
        <title>Update Grade</title>
        <!-- format different tags/aspects of the web page -->
        <style>
            .navi_buttons {
                display: inline-block;
            }
        </style>
    </head>

    <body>
        <h1>Update Information</h1>

        <!-- NOTE: test of back / logout button format ... still WIP-->
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
            <br>
            
            <!-- need to verify format: 2 uppercase letters, 3 numbers -->
            <label for="html">Course ID</label><br>
            <input type="text" id="course_id" name="course_id">
            <br>
            <br>
            
            <!-- can only select one ... accessible by the name test_type -->
            <input type="radio" id="test1" name="test_type" value="Test 1">
            <label for="test1">Test 1</label><br>
            <input type="radio" id="test2" name="test_type" value="Test 2">
            <label for="test2">Test 2</label><br>
            <input type="radio" id="test3" name="test_type" value="Test 3">
            <label for="test3">Test 3</label><br>
            <input type="radio" id="final_exam" name="test_type" value="Final Exam">
            <label for="final_exam">Final Exam</label><br>
            <br>

            <!-- verify valid grade number format -->
            <label for="html">Updated Grade</label><br>
            <input type="text" id="updated_grade" name="updated_grade"><br>
            
            <br>
            <input type="submit", value="Submit Request">
        </form>
    </body>
</html>