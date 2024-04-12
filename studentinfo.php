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

// Prepare a query to retrieve student data
$sql = "SELECT ID, STUDENTID, FIRSTNAME, MNAME, LASTNAME, AGE, SPORT, ROLE, GENDER, IMAGE_PATH FROM student"; // Include the ROLE column

// Execute the query
$result = $conn->query($sql);

// Output student data in a table format
if ($result->num_rows > 0) {
    echo "<table id='student-table' class='table'>";
    echo "<thead class='text-uppercase'><tr><th>#</th><th>Student ID</th><th>Full Name</th><th>Sport</th><th>Role</th><th>Gender</th><th>Image</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['STUDENTID'] . "</td>";
        echo "<td>" . $row['LASTNAME'] . ', ' . $row['FIRSTNAME'] . ' ' . $row['MNAME'] . "</td>"; // Fixed closing tag for Full Name
        echo "<td>" . $row['SPORT'] . "</td>";
        echo "<td>" . $row['ROLE'] . "</td>"; // Display the ROLE column
        echo "<td>" . $row['GENDER'] . "</td>";
        echo "<td><img src='" . $row['IMAGE_PATH'] . "' alt='Student Image'></td>";
        echo "<td class='action-buttons'>";
        echo "<a href='update.php?id=" . $row['ID'] . "'><i class='bi bi-pencil-square text-info mx-1'></i></a>";
        echo "<a href='delete.php?id=" . $row['ID'] . "'><i class='bi bi-trash text-danger'></i></a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
} else {
    echo "0 results";
}

$conn->close();
?>
