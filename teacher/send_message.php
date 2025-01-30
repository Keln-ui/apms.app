<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'apms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teacher_name = $_POST['teacher_name'];
    $parent_email = $_POST['parent_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert message into database
    $sql = "INSERT INTO messages (teacher_name, parent_email, subject, message) 
            VALUES ('$teacher_name', '$parent_email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
