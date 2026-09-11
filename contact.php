<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

// Create connection
mysqli_report(MYSQLI_REPORT_OFF);
$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO messages (name, email, subject, message) " .
               "VALUES ('$name', '$email', '$subject', '$message')";

        $result = $connection->query($sql);

        if ($result) {
            echo "<script>
                    alert('Message sent successfully!');
                    window.location.href='index.html';
                  </script>";
        } else {
            echo "Error: " . $connection->error;
        }
    } else {
        echo "<script>
                alert('Please fill in all required fields.');
                window.history.back();
              </script>";
    }
}
?>