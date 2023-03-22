<?php
    // Connect to database
   include("conn_database.php");

    /** Converts file into 2D indexed array. 
     * Splits comma separated data into individual items. */
    function get_lines($fh) {
        while (!feof($fh)) {
            yield explode(',', fgets($fh));
        }
    }

    // Read data files
    $course_file = fopen('data/CourseFile.txt', 'r');
    $name_file = fopen('data/NameFile.txt', 'r');

    // Delete existing tables
    try {
        $sql = file_get_contents('sql/del_db.sql');
        echo $sql .'\n';
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . '\r\n'. $e->getMessage();
    }

    // Create db schema
    try {
        $sql = file_get_contents('sql/init_db.sql');
        echo $sql .'\n';
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo $sql . '\r\n'. $e->getMessage();
    }

    // Insert data
    $sql = $conn->prepare('INSERT INTO name (student_id, student_name) VALUES (?, ?)');
    foreach (get_lines($name_file) as $row) {
        if (count($row) > 1) {
            $sql->bindValue(1, $row[0]);
            $sql->bindValue(2, trim($row[1]));
            $sql->execute();
        }
        
    }

    $sql = $conn->prepare('INSERT INTO course (student_id, course_id, test_1, test_2, test_3, final_exam) VALUES (?, ?, ?, ?, ?, ?)');
    foreach(get_lines($course_file) as $row) {
        if (count($row) > 1) {
            $sql->bindValue(1, $row[0]);
            $sql->bindValue(2, $row[1]);
            $sql->bindValue(3, $row[2]);
            $sql->bindValue(4, $row[3]);
            $sql->bindValue(5, $row[4]);
            $sql->bindValue(6, $row[5]);
            $sql->execute();
        }
    }

    fclose($course_file);
    fclose($name_file);

    $conn = null;
?>