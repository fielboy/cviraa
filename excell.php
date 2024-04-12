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

$filename = 'AttendanceRecord-' . date('Y-m-d') . '.csv';

$query = "SELECT a.STUDENTID, CONCAT(s.FIRSTNAME, ' ', s.LASTNAME) AS FULLNAME, s.SPORT, s.ROLE, a.TIMEIN, a.logdate
          FROM attendance AS a
          LEFT JOIN student AS s ON a.STUDENTID = s.STUDENTID"; // Adjusted SQL query to include SPORT
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
    
$file = fopen($filename, "w");
if (!$file) {
    die("Error opening file: " . $filename);
}

$headers = array("STUDENTID", "FULL NAME", "SPORT", "ROLE", "TIME IN", "LOG DATE"); // Adjusted headers
fputcsv($file, $headers);

while ($row = mysqli_fetch_assoc($result)) { // Fetch associative array instead of indexed array
    $STUDENTID = $row['STUDENTID'];
    $FULLNAME = $row['FULLNAME'];
    $SPORT = $row['SPORT'];
    $ROLE = $row['ROLE'];
    $TIMEIN = $row['TIMEIN'];
    $LOGDATE = $row['logdate'];

    $row_data = array($STUDENTID, $FULLNAME, $SPORT, $ROLE, $TIMEIN, $LOGDATE); // Include SPORT and logdate in the row data
    fputcsv($file, $row_data);
}

fclose($file);

header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-type: application/csv;");
readfile($filename);
unlink($filename);
exit();
?>
