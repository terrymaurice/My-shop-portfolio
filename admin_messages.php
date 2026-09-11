<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

mysqli_report(MYSQLI_REPORT_OFF);
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM messages ORDER BY created_at DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages Backend</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Received Contact Messages</h2>
        <br>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Received At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . htmlspecialchars($row["name"]) . "</td>
                            <td>" . htmlspecialchars($row["email"]) . "</td>
                            <td>" . htmlspecialchars($row["subject"]) . "</td>
                            <td>" . htmlspecialchars($row["message"]) . "</td>
                            <td>" . $row["created_at"] . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No messages submitted yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>