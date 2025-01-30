<?php
session_start();

// Check if the student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: index.html");
    exit();
}

// Database connection
$host = 'localhost';
$dbname = 'apms';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch student's grades
$student_id = $_SESSION['student_id'];
$stmt = $conn->prepare("SELECT subject, grade FROM grades WHERE student_id = :student_id");
$stmt->bindParam(':student_id', $student_id);
$stmt->execute();
$grades = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - APMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to Your Dashboard</h1>
        <p>Here you can view your grades.</p>

        <?php if (count($grades) > 0): ?>
            <h2>Your Grades</h2>
            <table border="1">
                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
                <?php foreach ($grades as $grade): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($grade['subject']); ?></td>
                        <td><?php echo htmlspecialchars($grade['grade']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No grades found.</p>
        <?php endif; ?>

        <br>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>