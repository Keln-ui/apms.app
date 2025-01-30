<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'apms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all parents from the database
$sql = "SELECT p.id, p.parent_name, p.email, p.phone, s.name AS student_name, s.admission_number
        FROM parent p
        JOIN students s ON p.student_id = s.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Parent List</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Parent Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Student Name</th>
                <th>Admission Number</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['parent_name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['student_name'] . "</td>
                            <td>" . $row['admission_number'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No parents found</td></tr>";
            }
            ?>
        </table>
        <a href="teacher_dashboard.html" class="back-button">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
