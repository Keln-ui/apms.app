<?php
$conn = new mysqli('localhost', 'root', '', 'apms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$admission_number = $_POST['admission_number'];
$subject = $_POST['subject'];
$grade = $_POST['grade'];

$sql = "INSERT INTO grades (student_id, subject, grade)
        SELECT id, '$subject', '$grade' FROM students WHERE admission_number = '$admission_number'";

if ($conn->query($sql) === TRUE) {
    echo "Grade added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
