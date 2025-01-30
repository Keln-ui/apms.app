<?php
$conn = new mysqli('localhost', 'root', '', 'apms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['student_name'];
$admission_number = $_POST['admission_number'];
$class = $_POST['class'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "INSERT INTO students (name, admission_number, class ,username ,password) VALUES ('$name', '$admission_number', '$class' ,'$username' ,'$password')";

if ($conn->query($sql) === TRUE) {
    echo "Student added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
