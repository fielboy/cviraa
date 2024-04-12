<?php
// Establish a database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb"; // Replace "your_database_name" with your actual database name

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is passed in the URL
if (isset($_GET['id'])) {
    // Process delete operation
    $id = $_GET['id'];

    // Prepare delete query
    $sql = "DELETE FROM student WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        echo "<script>window.location = 'students.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID parameter provided";
}

// Close the database connection
$conn->close();
?>
