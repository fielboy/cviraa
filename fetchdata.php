<?php
// Establish a database connection
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

// Prepare a query to get the count of students for each sport
$sql = "SELECT SPORT, COUNT(*) AS COUNT FROM student GROUP BY SPORT";

// Execute the query
$result = $conn->query($sql);

// Initialize arrays to store data
$labels = array();
$counts = array();

// Process the query result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Store sport name as label
        $labels[] = $row['SPORT'];
        // Store count as data
        $counts[] = $row['COUNT'];
    }
}

// Close the database connection
$conn->close();

// Create an associative array to store the data
$data = array(
    'labels' => $labels,
    'counts' => $counts
);

// Convert the data to JSON format
$jsonData = json_encode($data);

// Output the JSON data
echo $jsonData;
?>
