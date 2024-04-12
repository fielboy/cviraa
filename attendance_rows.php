<?php
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

// Prepare SQL query
$sql = "SELECT * FROM attendance 
        LEFT JOIN student ON attendance.STUDENTID = student.STUDENTID 
        ORDER BY TIMEIN DESC 
        LIMIT 1";

// Execute SQL query
$query = $conn->query($sql);

// Check for errors in query execution
if (!$query) {
    die("Query failed: " . $conn->error);
}

// Check if there are any rows returned
if ($query->num_rows > 0) {
    // Output data of each row
    while ($row = $query->fetch_assoc()) {
        ?>
        <tr class="text-capitalize">
            <td><img src="<?php echo $row['IMAGE_PATH']; ?>" alt="Student Image" style="width: 150px; height: 150px;"></td>
            <td><?php echo $row['STUDENTID']; ?></td>
            <td><?php echo $row['LASTNAME'] . ', ' . $row['FIRSTNAME'] . ' ' . $row['MNAME']; ?></td>
            <td><?php echo $row['SPORT']; ?></td>
            <td><?php echo $row['ROLE']; ?></td>
            <td><?php echo $row['TIMEIN']; ?></td>
            <td><?php echo $row['logdate']; ?></td>
        </tr>
        <?php
    }
}

// Close connection
$conn->close();
?>
