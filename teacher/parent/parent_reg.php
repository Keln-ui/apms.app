<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'apms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $student_id = $_POST['student_id'];
    $parent_name = $_POST['parent_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
   $confirm_password=$_POST['confirm_password'];
    // Validate passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Insert data into the database
    $sql = "INSERT INTO parent (student_id, parent_name, email, phone, password) VALUES ('$student_id', '$parent_name', '$email', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Parent registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
