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
    <title>Admin - Message Center</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #0a0f1d; color: #f8fafc; }
        .card-custom { background: #131b2e; border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; }
        .table-dark-custom { --bs-table-bg: #1a233a; --bs-table-color: #f8fafc; border-color: rgba(255,255,255,0.1); }
    </style>
</head>
<body class="p-4">
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Admin - Submitted Messages</h2>
            <a href="index.html" class="btn btn-outline-light btn-sm">Back to Portfolio</a>
        </div>

        <div class="card card-custom p-4">
            <div class="table-responsive">
                <table class="table table-dark-custom table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date Received</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>" . htmlspecialchars($row['name']) . "</td>
                                    <td>" . htmlspecialchars($row['email']) . "</td>
                                    <td>" . htmlspecialchars($row['subject']) . "</td>
                                    <td>" . htmlspecialchars($row['message']) . "</td>
                                    <td>{$row['created_at']}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4 text-muted'>No messages received yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>