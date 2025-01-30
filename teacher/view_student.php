<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'apms');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all students from the database
$sql = "SELECT id, name, admission_number, class FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student List</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Admission Number</th>
                <th>Class</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['admission_number'] . "</td>
                            <td>" . $row['class'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students found</td></tr>";
            }
            ?>
        </table>
        <a href="index.html" class="back-button">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
