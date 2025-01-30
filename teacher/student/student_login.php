<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'apms';
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Validate login
$stmt = $conn->prepare("SELECT * FROM students WHERE username = :username AND password = :password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password); // In real-world apps, use password hashing
$stmt->execute();

$student = $stmt->fetch(PDO::FETCH_ASSOC);

if ($student) {
    // Store student ID in session
    $_SESSION['student_id'] = $student['id'];
    header("Location: student_dashboard.php");
    exit();
} else {
    echo "Invalid username or password. <a href='index.html'>Try again</a>";
}
?>