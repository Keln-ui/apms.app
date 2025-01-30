<?php
// Database connection
$host = 'localhost';
$dbname = 'apms';
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

// Connect to the database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate login
$stmt = $conn->prepare("SELECT * FROM parent WHERE email = :email AND password = :password");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password); // In real-world apps, use password hashing (e.g., password_hash())
$stmt->execute();

$parent = $stmt->fetch(PDO::FETCH_ASSOC);

if ($parent) {
    // Redirect to the parent dashboard
    header("Location: parent_dashboard.html");
    exit();
} else {
    echo "Invalid email or password. <a href='index.html'>Try again</a>";
}
?>