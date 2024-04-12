<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['studentID'])) {
    $studentID = $_POST['studentID'];

    // Set timezone to Filipino time (Asia/Manila)
    date_default_timezone_set('Asia/Manila');

    $date = date('Y-m-d');
    $time = date('h:i:s A'); // Modified to store time in 12-hour format with AM/PM

    $sql = "SELECT * FROM student WHERE STUDENTID = '$studentID'";
    $query = $conn->query($sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = 'Cannot find QRCode number ' . $studentID;
    } else {
        $row = $query->fetch_assoc();

        // Assuming the role is retrieved from the database
        $role = $row['ROLE']; // Assuming ROLE is the column name for the role

        $id = $row['STUDENTID'];

        // Insert a new record for the student's scan
        $sql = "INSERT INTO attendance (STUDENTID, ROLE, TIMEIN, logdate) VALUES ('$studentID', '$role', '$time', '$date')";

        if ($conn->query($sql) === TRUE) {
            // If the insertion is successful, redirect to index.php
            header("Location: index.php");
            exit(); // Terminate script after redirection
        } else {
            // If there's an error with the insertion, display the error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
