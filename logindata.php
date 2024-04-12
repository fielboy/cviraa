<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qrcodedb";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get studentID from the form
    $studentID = $_POST['studentID'];

    // Prepare a query to check if the studentID exists and sanitize input
    $stmt = $conn->prepare("SELECT * FROM admin WHERE IDNUM = ?");
    
    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $studentID);

    // Execute the query
    if (!$stmt->execute()) {
        die("Error in executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Student ID exists, set session variable to indicate successful login
        $_SESSION['studentID'] = $studentID;
        header("Location: dashboard.php"); // Redirect to dashboard or any other page
        exit;
    } else {
        // Student ID does not exist, set error message
        $_SESSION['error'] = 'Invalid ID. Please try again.';
        header("Location: login.php"); // Redirect back to login page
        exit;
    }

    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();
}
?>
